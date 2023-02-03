<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{

    public function AddProductview(){
        $cat=Catagory::all();
        return view('Admin.products.Addproduct')->with('catagories',$cat);
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
      Alert::success('Product Aded successfully',"You have Aded the Product");

      return redirect()->back()->with('massege','Product added successfully');


    }

    public function allproductview(){
        $products=Product::all();
        return view('Admin.products.showproducts')->with('products',$products);
    }

    public function DeleteProduct($id){

        $product=Product::find($id);
        unlink("product/".$product->first()->image);
        $product->delete();
        Alert::success('Product deleted successfully',"You have deleted the Product");

        return redirect()->back()->with('massege','Product deled successfully');
    }



    public function EditProduct($id){
        $cat=Catagory::all();
        $product=Product::where('id',$id)->get();

        return view('Admin.products.editproducts')->with('product',$product[0])->with('catagories',$cat);;
    }


    public function updateproduct(Request $request){


        $this->validate($request,[
            'title' =>'required|min:3',
            'description' =>'required|min:3',

            'quantity' =>'required',
            'price' =>'required',
            'discount_price' =>'required|min:3',
        ]);


      $product=Product::where('id',$request->id)->first();

      $product->title=$request->title;
      $product->description=$request->description;
      $product->quantity=$request->quantity;
      $product->price=$request->price;
      $product->catagory=$request->catagory;
      $product->discount_price=$request->discount_price;
      if($request->hasFile('image')){
        unlink("product/".$product->image);
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
      }

      $product->save();

      return redirect()->back()->with('massege','Product updated successfully');


    }


    public function searchp(Request $request){
        $searchq=$request->searchq;
        // return $searchq;
              $products=Product::where('title','LIKE','%%'.$searchq.'%')->get();
        return view('Admin.products.showproducts')->with('products',$products);

            }
}
