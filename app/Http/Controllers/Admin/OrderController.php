<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductOrder;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;



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
       $order->paymet_status="paid";
$order->save();
Alert::success('Order completed successfully',"You have completed the order");

        return redirect()->back()->with('massege','Order completed successfully');

    }

    public function completepayment($id){
        $order=Order::where('id',$id)->first();

       $order->paymet_status="paid";
$order->save();
        return redirect()->back()->with('massege','payment completed successfully');

    }



    public function printorder($id){
        $order=Order::where('id',$id)->first();
        $productorders=ProductOrder::where('o_id',$id)->get();
        // return view('Admin.pdf',compact('order','productorders'));
    $pdf=PDF::loadView('admin.pdf',compact('order','productorders'));

        return $pdf->download('order_details.pdf');

    }



}
