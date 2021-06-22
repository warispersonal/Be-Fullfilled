<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShoppingResource;
use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index(){

    }
    public function store(Request $request){
        $shopping_cart = new ShoppingCart();
        $shopping_cart->product_id = $request->product_id;
        $shopping_cart->user_id = Auth::id();
        $shopping_cart->quantity = $request->quantity;
        $shopping_cart->save();
        return $this->success('Shopping Cart Added', new ShoppingResource($shopping_cart));
    }
    public function destroy($id){

    }
}
