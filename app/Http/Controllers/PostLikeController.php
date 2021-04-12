<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function storeLike(Post $post, Request $request)
    {
        // dd($post->likeBy($request->user()));

        if($post->likeBy($request->user())){
            return back();
        }

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        $user = auth()->user();

        if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){
            Mail::to($post->user)->send(new PostLike(
                auth()->user(), 
                $post
            ));
        }
        // dd($post);
        return back();
    }

    public function removeLike(Post $post, Request $request)
    {
        $post->likes()->delete([
            'user_id' => $request->user()->id
        ]);
        // dd($post);
        return back();
    }
}
