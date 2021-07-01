<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotesResource;
use App\Http\Resources\ShoppingCollection;
use App\Http\Resources\ShoppingResource;
use App\Notes;
use App\ShoppingCart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index($limit = 10)
    {

        $carts = ShoppingCart::where('user_id', Auth::id())->paginate($limit);
        return $this->success('Shopping Cart List', new ShoppingCollection($carts));
    }

    public function store(Request $request)
    {
        $shopping_cart = ShoppingCart::where("product_id", $request->product_id)->where("user_id", Auth::id())->get();
        if (count($shopping_cart) > 0) {
            $shopping_cart = $shopping_cart[0];
            $shopping_cart->quantity = ((int)$request->quantity + (int)$shopping_cart->quantity);
            $shopping_cart->save();
            return $this->success('Shopping Cart Added', new ShoppingResource($shopping_cart));
        } else {
            $shopping_cart = new ShoppingCart();
            $shopping_cart->product_id = $request->product_id;
            $shopping_cart->user_id = Auth::id();
            $shopping_cart->quantity = $request->quantity;
            $shopping_cart->save();
            return $this->success('Shopping Cart Added', new ShoppingResource($shopping_cart));
        }
    }

    public function destroy($id)
    {
        $shopping_cart = ShoppingCart::find($id);
        if ($shopping_cart) {
            $shopping_cart->delete();
            return $this->success("Shopping Cart Deleted");
        } else {
            return $this->failure('Shopping Cart not found', 404);
        }
    }
}
