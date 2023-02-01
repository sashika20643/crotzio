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
        $count=Cart::where('u_id',Auth::user()->id)->get()->count();
        return view('common.index')->with('products',$products)->with('count',$count);
    }


    public function productsview(){
        $products=Product::where('quantity','>','0')->paginate(20);
        $count=Cart::where('u_id',Auth::user()->id)->get()->count();
return view('common.product')->with('products',$products)->with('count',$count);

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

return redirect()->back();

    }

    public function showcart(){

        $cart=Cart::where('u_id',Auth::user()->id)->get();
        $count=$cart->count();

        return view('common.cart')->with('cart',$cart)->with('count',$count);


    }


    public function DeleteCart($id){
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();



    }

    public function Addqty($id){

        $cart=Cart::find($id);
        $product=Product::where('id',$cart->p_id)->first();

        if(0<$product->quantity){
            $cart->quantity +=1;
            $cart->total=$cart->price*$cart->quantity;
            $product->quantity -=1;
            $product->save();
            $cart->save();
        }


        return redirect()->back();



    }
    public function Minqty($id){
        $cart=Cart::find($id);
        $product=Product::where('id',$cart->p_id)->first();
        if($cart->quantity>0){
            $cart->quantity -=1;
            $cart->total=$cart->price*$cart->quantity;
            $product->quantity +=1;
            $product->save();
        }


        $cart->save();
        return redirect()->back();



    }


   public function purchesoption (){
    $count=Cart::where('u_id',Auth::user()->id)->get()->count();
    $total=Cart::where('u_id',Auth::user()->id)->first()->sum('total');
    $user=Auth::user();
    return view('common.purchesoption')->with('count',$count)->with('user',$user)->with('total',$total);
   }

}
