<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
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

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');

Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');
Route::get('/@{username}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
Route::patch('/settings', [SettingsController::class, 'update'])->name('settings.update');
