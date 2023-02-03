<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductOrder;

use Auth;

class HomeController extends Controller
{
    //
    public function redirect(){


        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
            $totalproducts=Product::all()->count();
            $totalorders=Order::all()->count();
            $totalusers=User::all()->count();
        $orders=Order::where("paymet_status","Paid")->get();

        $totalrevenue=0;
        foreach ($orders as $order) {
            $productordert=ProductOrder::where('o_id',$order->id)->sum('price');
            $totalrevenue+=$productordert;
        }
        $totalcompleted=Order::where("deliver_status","deliverd")->get()->count();
        $totalyettocomplete=Order::where("deliver_status","processing")->get()->count();
            return view('admin.home',compact('totalproducts','totalorders','totalusers','totalrevenue','totalcompleted','totalyettocomplete'));
        }
        else{

            $orders=Order::where('u_id',Auth::user()->id)->get();
            $productorders=ProductOrder::all();

            return view('dashboard')->with('orders',$orders)->with('productorders',$productorders);;
        }
    }


}
