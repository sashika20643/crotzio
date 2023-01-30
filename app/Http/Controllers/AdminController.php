<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

public function catagories(){
    return view('Admin.catagory');
}


}
