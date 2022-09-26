<?php

declare(strict_types=1);

namespace App\Inertable;

use App\Models\Suggestion;
use App\Abstracts\Inertable;
use Rizkhal\Inertable\Column;
use Illuminate\Database\Eloquent\Builder;

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
            Column::make('name', 'name')->searchable()->sortable(),
            Column::make('email', 'email')->searchable()->sortable(),
            Column::make('address', 'address')->searchable()->sortable(),
            Column::make('suggestion', 'suggestion')->searchable()->sortable(),
            Column::make('created_at', 'created_at')->searchable()->sortable()
                ->format(fn($row) => $row->created_at->diffForHumans()),
        ];
    }
}
