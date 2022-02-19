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

Route::get('/', \App\Http\Controllers\IndexController::class)->name('index');
Route::group(['prefix'=>'posts', 'as'=>'posts.'], function (){
    Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('index');
    Route::get('/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('show');
});
Route::group(['prefix'=>'tags', 'as'=> 'tags.'], function (){
    Route::get('/{tag}/posts', [\App\Http\Controllers\TagsController::class, 'postsByTag'])->name('posts');
});

