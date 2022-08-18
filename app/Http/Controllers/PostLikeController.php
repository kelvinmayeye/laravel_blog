<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    //protects unathenticated user to like
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function store(Post $post, Request $request){

        if($post->likedBy($request->user())){
            return response(null, 409);//return this page
        }
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);//creates like
        

        if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){
            Mail::to($post->user)->send(new PostLiked(auth()->user(),$post));
        }

        return back();
    }

    public function destroy(Post $post, Request $request){
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
