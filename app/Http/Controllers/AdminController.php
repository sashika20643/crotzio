<?php

namespace App\Http\Controllers;
use App\Models\Catagory;

use Illuminate\Http\Request;

class AdminController extends Controller
{

public function catagories(){
    return view('Admin.catagory');
}
public function CreateCatagory(Request $request){
    $cat=new Catagory;
    $cat->name=$request->cname;
    $cat->save();
    return redirect()->back()->with('massege','categery added successfully');
}

}
