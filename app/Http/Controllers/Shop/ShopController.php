<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Auth;

class ShopController extends Controller
{


    public function index(){

        $products=Product::all()->take(10);
        return view('common.index')->with('products',$products);
    }


    public function productsview(){
        $products=Product::paginate(20);
return view('common.product')->with('products',$products);

    }

    public function addtocart(Request $request,$id){

if(Cart::where('p_id',$id)->exists()){
    $cart=Cart::where('p_id',$id)->first();

$cart->quantity =$cart->quantity+$request->quantity;
$cart->total=$cart->quantity*$cart->price;
$cart->save();
}
else{
    $product=Product::find($id);
    $product->quantity=$product->quantity-$request->quantity;
    $cart=new Cart;
    $cart->u_id=Auth::user()->id;
    $cart->p_id=$product->id;
    $cart->product_title=$product->title;
    $cart->price=$product->discount_price;
    $cart->image =$product->image;
    $cart->quantity=$request->quantity;
    $cart->total=$product->discount_price*$request->quantity;
    $product->save();
    $cart->save();

}

return $cart;

    }


}
