<?php

namespace App\Http\Controllers\api\v1;

use App\Constant\ProjectConstant;
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
    public function index($limit = ProjectConstant::TOTAL_API_PAGINATION)
    {

        $carts = ShoppingCart::where('user_id', Auth::id())->paginate($limit);
        return $this->success('Shopping Cart List', new ShoppingCollection($carts));
    }

    public function store(Request $request)
    {
        $shopping_cart = ShoppingCart::where("product_id", $request->product_id)->where("user_id", Auth::id())->get();
        if($request->cart_status == "add_to_cart")
        {
            if($request->quantity > 0 ){
                if (count($shopping_cart) > 0) {
                    $shopping_cart = $shopping_cart[0];
                    $shopping_cart->quantity = ((int)$request->quantity + (int)$shopping_cart->quantity);
                    $shopping_cart->save();
                    return $this->success('Shopping Cart Added', new ShoppingResource($shopping_cart));
                }
                else {
                    $shopping_cart = new ShoppingCart();
                    $shopping_cart->product_id = $request->product_id;
                    $shopping_cart->user_id = Auth::id();
                    $shopping_cart->quantity = $request->quantity;
                    $shopping_cart->save();
                    return $this->success('Shopping Cart Added', new ShoppingResource($shopping_cart));
                }
            }else{
                return $this->failure('Product not added to cart because quantity is 0');
            }
        }
        elseif ($request->cart_status == "quantity_update"){
            if($request->quantity > 0 ) {
                if (count($shopping_cart) > 0) {
                    $shopping_cart = $shopping_cart[0];
                    $shopping_cart->quantity = $request->quantity;
                    $shopping_cart->save();
                    return $this->success('Quantity updated', new ShoppingResource($shopping_cart));
                }
            }
            else{
                foreach ($shopping_cart as $cart){
                    $cart->delete();
                }
                return $this->success("Remove product from shopping cart");
            }
        }
        else{
            return $this->failure('Flag is not set');
        }
    }

    public function destroy($id)
    {
        $shopping_cart = ShoppingCart::find($id);
        if ($shopping_cart) {
            $shopping_cart->delete();
            return $this->success("Remove product from shopping cart");
        } else {
            return $this->failure('Product not found in cart', 404);
        }
    }
}
