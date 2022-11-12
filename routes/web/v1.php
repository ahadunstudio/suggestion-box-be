<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Client\SuggestionController as ClientSuggestionController;
use App\Http\Controllers\Setting\FileController;
use App\Http\Controllers\Setting\UserController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('auth.login'));

// suggestion table for monitor (?)
// Route::get('suggestions', [ClientSuggestionController::class, 'index'])->name('suggestions.index');
// Route::get('suggestions/selected', [ClientSuggestionController::class, 'selected'])->name('suggestions.selected');
// Route::get('file/{file:url}', [FileController::class, 'show'])->name('file.url.invoke');

Route::middleware('auth')->prefix('admin')->as('admin.')->group(function () {
    // Route::resource('setting', SettingController::class);
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('suggestions', [SuggestionController::class, 'index'])->name('suggestions.index');
    Route::delete('suggestions/delete', [SuggestionController::class, 'delete'])->name('suggestions.delete');
    // Route::post('suggestions/status', [SuggestionController::class, 'statuses'])->name('suggestions.store.status');
    // Route::post('suggestions/display/{suggestion:id}', [SuggestionController::class, 'status'])->name('suggestions.store.display');

    // setting user credentials
    // Route::post('setting/password', [UserController::class, 'password'])->name('setting.password');

    // file
    // Route::post('setting/file', [FileController::class, 'store'])->name('setting.file.store');
});
