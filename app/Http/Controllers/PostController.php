<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index(){
        $post = Post::paginate(2);
        return view('posts.index',compact('post'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'body'=>'required'
        ]);
        //store user
        //$post = new Post();
        //dd($request->all());
        // $post->body=$request->body;
        // $post->save();

        $request->user()->posts()->create([
            'body' => $request->body
        ]);
        Session::flash("Success","Post added");
        return back();
    }
}
