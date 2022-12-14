<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware(['auth'])->only(['store','destroy']);
    }


    public function index(){
        $posts = Post::latest()->with(['user','likes'])->paginate(2);

        return view('posts.index',compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show',[
            'post' => $post
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'body'=>'required'
        ]);
        
        $request->user()->posts()->create([
            'body' => $request->body
        ]);
        Session::flash("Success","Post added");
        return back();
    }
    public function destroy(Post $post){
        // if(!$post->ownedBy(auth()->user())){
        //     dd('no');
        // }

        $this->authorize('delete',$post);

        dd('wait');
    //     $post->delete();
    //     return back();
     }
}
