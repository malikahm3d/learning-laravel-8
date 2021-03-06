<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\postController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function(){
    return view('posts.index');
})->name('posts');

Route::get('/home', function(){
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
//->name is inhreted

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'loguserin'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/posts', [postController::class, 'index'])->name('posts');
Route::post('/posts', [postController::class, 'store'])->name('posts')->middleware('auth');
Route::delete('/posts/{post:id}', [postController::class, 'destroy'])->name('posts.destroy')->middleware('auth');


Route::post('/posts/{post:id}/likes', [LikeController::class, 'store'])->name('posts.like')->middleware('auth');
Route::delete('/posts/{post:id}/likes', [LikeController::class, 'destroy'])->name('posts.like')->middleware('auth');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('user.posts')->middleware('auth');
