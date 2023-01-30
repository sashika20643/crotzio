<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Auth;

class HomeController extends Controller
{
    //
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else{
            return view('dashboard');
        }
    }


    public function index(){
        return view('common.index');
    }
}
