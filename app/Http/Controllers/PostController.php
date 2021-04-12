<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('store', 'destroy');
    }
    //
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->with('user', 'likes')->paginate(10); // collection
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        $user = $post->user();
        return view('posts.show', [
            'post' => $post,
            'user' => $user,
        ]);
    }

    public function store(Request $request )
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }

    public function destroy($id){
        $post = Post::find($id);

        $this->authorize('delete', $post);
        
        $post->delete();
        return redirect('posts');

    }
}
