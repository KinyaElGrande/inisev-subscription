<?php

use App\Http\Controllers\API\SubscriptionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WebsiteController;
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

Route::prefix('/v1')->group(function () {
    Route::post('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/{user}/website/subscribe', [SubscriptionController::class, 'subscribe'])->name('website.subscribe');

    Route::post('/website/create', [WebsiteController::class, 'createWebsite'])->name('website.create');
    Route::post('/website/{website}/post/create', [WebsiteController::class, 'createPost'])->name('website.post.create');
});


