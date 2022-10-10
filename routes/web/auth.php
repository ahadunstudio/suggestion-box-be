<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth.')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
    Route::post('login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');
    Route::delete('logout', [LoginController::class, 'destroy'])->name('logout');
});
