<?php

use App\Http\Controllers\SecretShareController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/share-secret', [SecretShareController::class, 'index'])->name('secret.share.form');
Route::post('/share-secret', [SecretShareController::class, 'store'])->name('secret.share.store');
