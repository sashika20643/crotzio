<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Product;
use Auth;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function AddComment(Request $request,$id){

        $comment=new Comment;
        $comment->p_id=$id;
        $comment->comment=$request->comment;
        $comment->username=Auth::user()->name;
        $comment->u_id=Auth::user()->id;
        $comment->save();
        return redirect()->back();

    }

    public function DeleteComment($id){

        $comment=Comment::where('id',$id);
        $comment->delete();
        return redirect()->back();
    }
}
