<?php

use App\Http\Controllers\PasswordShareController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/share-password', [PasswordShareController::class, 'index'])->name('password.share.form');
Route::post('/share-password', [PasswordShareController::class, 'store'])->name('password.share.store');
