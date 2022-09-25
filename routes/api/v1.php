<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SuggestionJsonController;

Route::prefix('v1')->group(function () {
    Route::post('suggestions', SuggestionJsonController::class);
});
