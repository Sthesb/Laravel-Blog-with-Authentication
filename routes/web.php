<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// index of the application / home
Route::get('/', function (){
    return view('home');
})->name('home');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');

// register user
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// login user
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// logout user
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post:body}/show', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::post('/posts/{id}', [PostController::class, 'destroy'])->name('posts.delete');


// Likes
Route::post('/posts/{post}/likes', [PostLikeController::class, 'storeLike'])->name('posts.likes');
Route::post('/posts/{post}/unlike', [PostLikeController::class, 'removeLike'])->name('posts.unlike');

// Route::post('/posts', [PostController::class, 'store']);

// User Posts
Route::get('/users/{user:name}/posts', [UserPostController::class, 'index'])->name('users.posts');