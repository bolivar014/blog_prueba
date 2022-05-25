<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ------------------ CONTROLADORES DE VISTAS USUARIOS ------------------
// Accedo al recurso compartido de los posts
Route::resource('/posts', PostController::class);
// Controlador para crear nuevo post
Route::post('/posts/storePost', [App\Http\Controllers\PostController::class, 'storePost'])->name('posts.storePost');


// ------------------ CONTROLADORES DE VISTAS ADMINS ------------------
// Controlador de recursos compartidos para vistas admin
Route::resource('/admins', AdminController::class);