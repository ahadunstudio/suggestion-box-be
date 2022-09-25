<?php

declare(strict_types=1);

namespace App\Inertable;

use App\Models\Suggestion;
use Illuminate\Database\Eloquent\Builder;
use Rizkhal\Inertable\Column;
use Rizkhal\Inertable\Inertable;

class SuggestionTable extends Inertable
{
    public function query(): Builder
    {
        return Suggestion::query()
            ->when(
                ! $this->hasSort(),
                fn (Builder $query) => $query->orderBy('created_at', 'desc')
            );
    }

    public function columns(): array
    {
        return [
            Column::make('id', 'id'),
        ];
    }
}
