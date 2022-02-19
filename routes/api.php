<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'posts', 'as' => 'posts.'], function (){
    Route::post('/{postId}/likes/increment', [\App\Http\Controllers\Api\PostLikesController::class, 'increment']);
    Route::post('/{postId}/views/increment', [\App\Http\Controllers\Api\PostViewController::class, 'increment']);
    Route::post('/{post}/comments/post', [\App\Http\Controllers\Api\CommentController::class, 'store']);
});
