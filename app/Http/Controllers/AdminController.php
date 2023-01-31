<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

public function catagories(){
    $cat=Catagory::all();
    return view('Admin.catagory')->with('catagories',$cat);
}
public function CreateCatagory(Request $request){

    $this->validate($request,[
        'cname' =>'required|min:3'
    ]);
    $cat=new Catagory;
    $cat->name=$request->cname;
    $cat->save();
    return redirect()->back()->with('massege','categery added successfully');
}

public function DeleteCatagory($id){

    $cat=Catagory::find($id);
    $cat->delete();
    return redirect()->back()->with('massege','categery deled successfully');
}
public function AddProductview(){
    $cat=Catagory::all();
    return view('Admin.Addproduct')->with('catagories',$cat);
}
public function addproduct(Request $request){


    $this->validate($request,[
        'title' =>'required|min:3',
        'description' =>'required|min:3',
        'image' =>'required',
        'quantity' =>'required',
        'price' =>'required',
        'discount_price' =>'required|min:3',
    ]);


  $product=new Product;
  $product->title=$request->title;
  $product->description=$request->description;
  $product->quantity=$request->quantity;
  $product->price=$request->price;
  $product->catagory=$request->catagory;
  $product->discount_price=$request->discount_price;
  $image=$request->image;
  $imagename=time().'.'.$image->getClientOriginalExtension();
  $request->image->move('product',$imagename);
  $product->image=$imagename;
  $product->save();

  return redirect()->back()->with('massege','Product added successfully');


}

}
