<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\ProjectConstant;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\ShoppingCart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

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
            $cart[] = $item['cart_id'];
        }
        $shopping_carts = ShoppingCart::whereIn('id',$cart)->get();
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
        foreach ($cart as $item){
            $shopping_cart = ShoppingCart::find($item);
            $shopping_cart->delete();

        }
        return $this->success("Order place successfully", new OrderResource($order));
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

}
