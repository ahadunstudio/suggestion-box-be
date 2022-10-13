<?php

namespace App\Actions;

use App\Models\Suggestion;
use Illuminate\Database\Eloquent\Builder;

class SuggestionAction
{
    public static function execute(int | null $id = null)
    {
        $query = Suggestion::query()
            ->when(
                $id,
                fn (Builder $query, int $id) => $query->whereId($id + 1),
                fn (Builder $query) => $query->orderBy('created_at', 'desc')
            )->first();

        return $query ? $query : Suggestion::query()->orderBy('created_at', 'desc')->first();
    }
}
