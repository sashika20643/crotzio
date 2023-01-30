<?php

namespace App\Http\Controllers;
use App\Models\Catagory;

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

}
