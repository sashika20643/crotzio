<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductOrder;



class OrderController extends Controller
{
    //
    public function orders(){
        $orders=Order::all();
        $productorders=ProductOrder::all();
        return view('Admin.orders.showorders')->with('orders',$orders)->with('productorders',$productorders);
    }
    public function completeorder($id){
        $order=Order::where('id',$id)->first();
       $order->deliver_status="deliverd";
       $order->paymet_status="Completed";
$order->save();
        return redirect()->back()->with('massege','Order completed successfully');

    }

    public function completepayment($id){
        $order=Order::where('id',$id)->first();

       $order->paymet_status="Completed";
$order->save();
        return redirect()->back()->with('massege','payment completed successfully');

    }
}
