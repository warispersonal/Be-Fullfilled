<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Order;
use App\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index($status = null)
    {
        $user = Auth::user();
        $orders = [];
        if ($status == null) {
            $orders = $user->orders;
        }
        if ($status != null) {
            $orders = $user->orders()->where('order_status_id', $status)->get();
        }
        return $this->success("User Order List", OrderResource::collection($orders));
    }

    public function place_order(Request $request)
    {

        $order = new Order();
        $order->shipping_address = $request->shipping_address;
        $order->user_id = Auth::id();
        $order->order_status_id = 1;
        $order->save();
        $items = $request->items;
        foreach ($items as $item) {
            $order_product = new OrderProduct();
            $order_product->price = $item['price'];
            $order_product->quantity = $item['quantity'];
            $order_product->total_price = (double)((double)$item['price'] * (int)$item['quantity']);
            $order_product->product_id = $item['product_id'];
            $order_product->order_id = $order->id;
            $order_product->save();
        }
        return $this->success("Order place successfully", new OrderResource($order));

    }

    public function show($id)
    {
        $user = Auth::user();
        $order = $user->orders()->where('id', $id)->get()->first();
        if ($order) {
            return $this->success("Order place successfully", new OrderResource($order));
        } else {
            return $this->failure('Order not found', 404);
        }
    }

}
