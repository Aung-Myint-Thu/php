<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Comment;

class CommentController extends Controller
{
    public function delete($id){
        $comment = Comment::find($id);
        if(Gate::allows("comment-delete",$comment)) {
        $comment->delete();
        return back()->with("info","A Comment Delete");
        } else{
        return back()->with("info","Unauthorize");

        }
    }
    public function create(){
        $validator = validator(request()->all(),[
            "content" => "required",
            "article_id" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $comment = new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return back()->with("info","A Comment Added");
    }
    public function edit($id){
        $comment = Comment::find($id);
        return view("comments.edit",[
            "comment"=>$comment
        ]);
    }
    public function update($id){
        $validator = validator(request()->all(),[
            "content" => "required",
            "article_id" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }


        $comment = Comment::find($id);
        $comment->content = request()->content;
        $comment->article_id= request()->article_id;
        $comment->save();
        return redirect("/articles/detail/$comment->article_id");
    }
}
