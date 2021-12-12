<?php

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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/social', [App\Http\Controllers\SocialController::class, 'index'])->name('social');

Route::get('/friends',[\App\Http\Controllers\FriendController::class,'index'])->name('friends');
Route::post('/addFriend',[\App\Http\Controllers\FriendController::class,'addFriend'])->name('addFriend');
Route::delete('/removeFriend',[\App\Http\Controllers\FriendController::class,'removeFriend'])->name('removeFriend');

Route::resource('posts',\App\Http\Controllers\PostController::class);

Route::get('/user/{id}',[\App\Http\Controllers\FriendController::class,'getByUser'])->name('getByUser.single');
