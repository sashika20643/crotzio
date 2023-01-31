<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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


}
