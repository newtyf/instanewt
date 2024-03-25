<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name("home")->middleware("auth");

Route::view('/login', 'auth.login')->name("login");
Route::post('/login', [AuthenticatedSessionController::class, "store"])->name("login");
Route::post('/logout', [AuthenticatedSessionController::class, "destroy"])->name("logout")->middleware("auth");

Route::view('/register', 'auth.register')->name("register");
Route::post('/register', [RegisteredUserController::class, "store"])->name("register");

Route::view('/{user}', 'profile')->name("profile");
Route::view('/{user}/settings', 'settings')->name("settings")->middleware("auth");