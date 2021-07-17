<?php

namespace App\Http\Controllers\Admin;

use App\Constant\ProjectConstant;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(ProjectConstant::TOTAL_WEB_PAGINATION);
        return view('admin.orders.all-orders',compact('orders'));
    }
    public function show($id){

        $order = Order::find($id);
        $order_status = OrderStatus::all();
        $order_status_id = $order->order_status_id;
        return view('admin.orders.order_details',compact('order','order_status', 'order_status_id'));
    }

    public function update_order_status($id, $status){
        $order = Order::find($id);
        $order->order_status_id = $status;
        if($order->order_status_id == 3){
            $order->completed_at = now();
        }
        else{
            $order->completed_at = null;
        }
        $order->save();
        return redirect()->route('order_details',$id)->with('success_message', 'Order status successfully updated.');
    }
}
