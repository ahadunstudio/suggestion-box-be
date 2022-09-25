<?php

use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::resource('suggestions', SuggestionController::class);
