<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductOrder;
use Auth;
use Session;

use Stripe;

class ShopController extends Controller
{


    public function index(){

        $products=Product::where('quantity','>','0')->take(10);
        $count=0;
        if(Auth::check()){
            $count=Cart::where('u_id',Auth::user()->id)->get()->count();

        }
        return view('common.index')->with('products',$products)->with('count',$count);
    }


    public function productsview(){
        $products=Product::where('quantity','>','0')->paginate(20);
        $count=0;
        if(Auth::check()){
            $count=Cart::where('u_id',Auth::user()->id)->get()->count();

        }
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
public function addorder(Request $request){

    $cart=Cart::where('u_id',Auth::user()->id)->get();
    $order=new Order;

$order->u_name=$request->name;
$order->adress=$request->adress;
$order->email=$request->email;
$order->postal_code=$request->postal_code;
$order->phone=$request->phone_number;
$order->u_id=Auth::user()->id;
if($request->payment=="deliver"){
$order->paymet_status="cash on delivery";}
else{
    $order->paymet_status="Not yet";}


$order->deliver_status="Processing";

$order->save();
foreach ($cart as $item) {
    $productOrder= new ProductOrder;
    $productOrder->o_id=$order->id;
    $productOrder->p_id=$item->p_id;
    $productOrder->product_name=$item->product_title;
    $productOrder->quantity=$item->quantity;
    $productOrder->image=$item->image;

    $productOrder->price=$item->price;
    $productOrder->save();


}



if($request->payment=="deliver"){
    $cart=Cart::where('u_id',Auth::user()->id);
// $cart->delete();
Session::flash('success', 'Payment successful!');
$total=Cart::where('u_id',Auth::user()->id)->first()->sum('total');
$poder=ProductOrder::where('o_id',$order->id)->get();
return view('email.invoice')->with('total',$total)->with('productorder',$poder);
    return redirect(route('productpage'));

}

else{
    $total=Cart::where('u_id',Auth::user()->id)->first()->sum('total');
    $count=0;


    return view('common.stripe')->with('total',$total)->with('count',$count)->with('o_id',$order->id);
}

}

public function stripePost(Request $request,$total)

{

    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $o_id=$request->o_id;


    Stripe\Charge::create ([

            "amount" => $total * 100,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Test payment from itsolutionstuff.com."

    ]);



    Session::flash('success', 'Payment successful!');
    $order=Order::find($o_id);
    $order->paymet_status="Paid";
    $order->save();
    $cart=Cart::where('u_id',Auth::user()->id);
    $cart->delete();


    return redirect(route('productpage'));

}


}
