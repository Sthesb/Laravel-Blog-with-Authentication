<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }
    // register user
    public function store(Request $request){
        // validation
        $this->validate($request, [
            'name' => 'required | max:255',
            'username' => 'required | max:255',
            'email' => 'required | email',
            'password' => 'required | confirmed',
        ]);

        // store the user 
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // sign the user in
        auth()->attempt($request->only('email', 'password'));
        

        // redirect 
        return redirect()->route('dashboard');

    }
    
    
}
