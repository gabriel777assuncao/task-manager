<?php

use App\Http\Controllers\{LoginController, RegisterController};
use Illuminate\Support\Facades\Route;

Route::post('/registering', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
