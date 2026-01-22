<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FeedController::class, 'index'])->name('home');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');

Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
Route::view('/notifications', 'notifications.index')->name('notifications.index');
Route::view('/profile', 'profiles.show')->name('profile.show');
Route::view('/settings', 'settings.edit')->name('settings.edit');
