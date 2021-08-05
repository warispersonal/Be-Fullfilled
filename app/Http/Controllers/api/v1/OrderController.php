<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\FileConstant;
use App\Constant\ProjectConstant;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\ShoppingCart;
use App\StripeInitiatePayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Stripe\Customer;
use Stripe\EphemeralKey;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class OrderController extends Controller
{
    public function index($status = null, $limit = ProjectConstant::TOTAL_API_PAGINATION)
    {
        $user = Auth::user();
        $orders = [];
        if ($status == null) {
            $orders = $user->orders()->paginate($limit);
        }
        if ($status != null) {
            $orders = $user->orders()->where('order_status_id', $status)->paginate($limit);
        }
        return $this->success("User Order List", new OrderCollection($orders));
    }

    public function place_order(Request $request)
    {
        $shopping_list = [];
        $items = $request->items;
        $cart = [];
        foreach ($items as $item) {
            $cart[] = $item;
        }
        $shopping_carts = ShoppingCart::whereIn('id', $cart)->get();
        $total_price = 0;
        foreach ($shopping_carts as $item_cart) {
            $product = Product::find($item_cart->product_id);
            $total_price = $total_price + ((int)$item_cart->quantity * $product->price);
            $shopping['price'] = $product->price;
            $shopping['quantity'] = $item_cart->quantity;
            $shopping['total_price'] = (double)((double)$product->price * (int)$item_cart->quantity);
            $shopping['product_id'] = $product->id;
            $shopping_list[] = $shopping;
        }
        if($total_price < 50){
            return $this->failure("Amount must be greater than or equal to $0.5");
        }
        $order = new Order();
        $order->address_id = $request->address_id;
        $order->user_id = Auth::id();
        $order->order_status_id = 1;
        $order->total_price = $total_price;
        $order->save();
        foreach ($shopping_list as $item) {
            $order_product = new OrderProduct();
            $order_product->price = $item['price'];
            $order_product->quantity = $item['quantity'];
            $order_product->total_price = $item['total_price'];
            $order_product->product_id = $item['product_id'];
            $order_product->order_id = $order->id;
            $order_product->save();
        }
        foreach ($cart as $item) {
            $shopping_cart = ShoppingCart::find($item);
            if ($shopping_cart) {
                $shopping_cart->delete();
            }
        }
        $itemArray = [];
        $itemArray['order'] = new OrderResource($order);
        $stripe = $this->stripe_payment($total_price);
        $itemArray['stripe'] = $stripe;
        return $this->success("Order place successfully", $itemArray);
    }

    private function stripe_payment($amount)
    {
        Stripe::setApiKey(FileConstant::STRIPE_API_KEY);
        $customer = Customer::create();
        $ephemeralKey = EphemeralKey::create(
            ['customer' => $customer->id],
            ['stripe_version' => '2020-08-27']
        );
        $paymentIntent = PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'usd',
            'customer' => $customer->id
        ]);
        $stripe_payment = new StripeInitiatePayment();
        $stripe_payment->paymentIntent = $paymentIntent->client_secret;
        $stripe_payment->ephemeralKey = $ephemeralKey->secret;
        $stripe_payment->customer = $customer->id;
        $stripe_payment->user_id = Auth::id();
        $stripe_payment->save();
        return response([
            'paymentIntent' => $paymentIntent->client_secret,
            'ephemeralKey' => $ephemeralKey->secret,
            'customer' => $customer->id,
        ]);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if ($order) {
            return $this->success("Order place successfully", new OrderResource($order));
        } else {
            return $this->failure('Order not found', 404);
        }
    }

    public function transaction()
    {
        $user = Auth::user();
        $orders = $user->orders;
        $order_list = [];
        foreach ($orders as $order) {
            $item['id'] = $order->id;
            $item['total_price'] = $order->total_price;
            $first_product = $order->order_products->first()->product_id ?? null;
            $product = null;
            if ($first_product) {
                $product = Product::find($first_product);
            }
            $item['first_product'] = new ProductResource($product);
            $order_list[] = $item;
        }
        return $this->success('Transaction list', $order_list);
    }
}
