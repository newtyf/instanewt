<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'auth.login')->name("login");
Route::post('/login', [AuthenticatedSessionController::class, "store"])->name("login");
Route::post('/logout', [AuthenticatedSessionController::class, "destroy"])->name("logout")->middleware("auth");

Route::view('/register', 'auth.register')->name("register");
Route::post('/register', [RegisteredUserController::class, "store"])->name("register");

Route::view('/', "feed")->name("feed")->middleware("auth");

Route::get('/search', [UserController::class, "index"])->name("search.index")->middleware("auth");

Route::get('/posts', [PostController::class, "index"])->name("posts.index")->middleware("auth");
Route::view('/post/create', 'posts.create')->name("posts.create")->middleware("auth");
Route::post('/post/create', [PostController::class, "store"])->name("posts.create")->middleware("auth");

Route::post('/likes', [LikeController::class, "store"])->name("likes.create")->middleware("auth");
Route::delete('/likes', [LikeController::class, "destroy"])->name("likes.destroy")->middleware("auth");

Route::post('/follow', [FollowController::class, "store"])->name("follow.create")->middleware("auth");
Route::delete('/follow', [FollowController::class, "destroy"])->name("follow.destroy")->middleware("auth");

Route::get('/{user}', [UserController::class, 'show'])->name("account.profile");
Route::view('/account/settings', 'account.settings')->name("account.settings")->middleware("auth");
Route::view('/account/edit', 'account.edit')->name("account.edit")->middleware("auth");
Route::post('/account/edit', [UserController::class, 'update'])->name("account.edit")->middleware("auth");