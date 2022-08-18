<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('users/{user:name}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'loggin']);

Route::get('logout', [LogoutController::class, 'logout']);

Route::get('dashboard', [DashboardController::class, 'index']);

Route::get('post', [PostController::class, 'index'])->name('posts');
Route::post('post', [PostController::class, 'store']);
Route::delete('post/{post}/delete', [PostController::class, 'destroy']);

Route::post('posts/{post}/like', [PostLikeController::class, 'store']);
Route::delete('posts/{post}/unlike', [PostLikeController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
});
