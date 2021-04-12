@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12">
        <div class="p-6">
            <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
            <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count() ) }} and 
                recieved {{ $user->recievedLikes()->count() }} {{ Str::plural('like', $user->recievedLikes()->count() ) }}</p>
        </div>
        <div class="w-8/12 bg-white p-6  round-lg">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> 
                        <span class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        
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
                @endforeach
                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif
        </div>
    </div>

    
</div>
@endsection