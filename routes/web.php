<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!z
|
*/

Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
//rutas perfil
Route::get('editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::get('/{user:username}/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::post('/{user:username}/post/{post}', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::post('/images', [ImageController::class, 'store'])->name('image.store');

//like photos
Route::post('/post/{post}/likes',[LikeController::class, 'store'])->name('post.likes.store');
Route::delete('/post/{post}/likes',[LikeController::class, 'destroy'])->name('post.likes.destroy');

Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
