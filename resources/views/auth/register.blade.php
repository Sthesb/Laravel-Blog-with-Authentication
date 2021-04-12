@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6  round-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" 
                    value="{{ old('name') }}" placeholder="Your name">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" 
                    value="{{ old('username') }}" placeholder="Username">

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                <div class="grid grid-cols-2 gap-4">
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
                    <div class="mb-4 col-span-1">
                        <label for="name" class="sr-only">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="" placeholder="Confirm Password">

                        {{-- @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror --}}
                    </div>
                </div>
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 w-full px-4 rounded">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection