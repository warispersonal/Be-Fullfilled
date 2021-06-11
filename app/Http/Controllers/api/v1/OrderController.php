<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Order;
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
        $order->price = $request->price;
        $order->quantity = $request->quantity;
        $order->total_price = (int)((int)$request->price * (int)$request->quantity);
        $order->shipping_address = $request->shipping_address;
        $order->order_status_id = 1;
        $order->product_id = $request->product_id;
        $order->user_id = Auth::id();
        $order->save();
        return $this->success("Order place successfully", new OrderResource($order));

    }

}
