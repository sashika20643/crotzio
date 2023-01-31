<?php

namespace App\Http\Controllers\Admin;
use App\Models\Catagory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{

public function catagories(){
    $cat=Catagory::all();
    return view('Admin.catagory.catagory')->with('catagories',$cat);
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
