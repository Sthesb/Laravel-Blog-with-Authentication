@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6  round-lg">

        <div class="mb-4" >
            <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
            <span  class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
            
            <p class="mb-2">{{ $post->body }}</p>
            
            <div class="flex item-center">
                @auth
                {{-- like post --}}
                    @if(!$post->likeBy(auth()->user()))
                        <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold  px-2 rounded">Like</button>
                        </form>
                    @else
                    {{-- Unlike post --}}
                        <form action="{{ route('posts.unlike', $post->id) }}" method="POST" class="mr-1">
                            @csrf
                            <button type="submit" class="text-blue-500">Unlike</button>
                        </form>
                    @endif
                    {{-- delete post --}}
                    @can('delete', $post)
                        <form action="{{ route('posts.delete', $post) }}" method="post">
                            @csrf
                            <button type="submit" class="text-red-500">Delete Post</button>
                        </form>
                    @endcan
                    
                @endauth
            </div>
            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count() ) }}</span>
        </div>

                


    </div>
</div>
@endsection