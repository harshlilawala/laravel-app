<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PagesController::class,'index']);
Route::resource('/blog', PostsController::class);
// Route::get('/blog/{more}',[PostsController::class,'show']);
// Route::delete('/blog/{more}', 'PostController@destroy');
Route::get('/notifications', [App\Http\Controllers\PostsController::class, 'index'])->name('notifications.index');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('comments',[App\Http\Controllers\CommentController::class, 'store']);