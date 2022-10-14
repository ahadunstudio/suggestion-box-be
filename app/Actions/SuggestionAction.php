<?php

namespace App\Actions;

use App\Models\Suggestion;

class SuggestionAction
{
    public static function execute()
    {
        return Suggestion::query()->orderBy('created_at', 'desc')->first();
    }
}
