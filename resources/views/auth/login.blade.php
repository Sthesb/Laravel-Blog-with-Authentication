@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6  round-lg">
            @if (session('status'))
                <div class="bg-red-500 mt-2 text-white p-4 rounded-lg text-center mb-3">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                
                <div class="mb-4">
                    <label for="name" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" 
                    value="{{ old('email') }}" placeholder="Email">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4 col-span-1">
                    <label for="name" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" 
                    value="" placeholder="Password">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2 border-none">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 w-full px-4 rounded">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection