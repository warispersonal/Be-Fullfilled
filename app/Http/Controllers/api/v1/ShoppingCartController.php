<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShoppingResource;
use App\ShoppingCart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $carts = ShoppingCart::where('user_id', Auth::id())->get();
        return $this->success('Shopping Cart List', ShoppingResource::collection($carts));
    }

    public function store(Request $request)
    {
        $shopping_cart = new ShoppingCart();
        $shopping_cart->product_id = $request->product_id;
        $shopping_cart->user_id = Auth::id();
        $shopping_cart->quantity = $request->quantity;
        $shopping_cart->save();
        return $this->success('Shopping Cart Added', new ShoppingResource($shopping_cart));
    }

    public function destroy($id)
    {

    }
}
