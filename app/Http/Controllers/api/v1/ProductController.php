<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return $this->success("Products List", ProductResource::collection($products));
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return $this->success("Single Product", new ProductResource($product));
        } else {
            return $this->failure('Product not found', 404);
        }

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
