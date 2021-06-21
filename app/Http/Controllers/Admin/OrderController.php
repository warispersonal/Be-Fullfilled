<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.orders.all-orders',compact('orders'));
    }
}