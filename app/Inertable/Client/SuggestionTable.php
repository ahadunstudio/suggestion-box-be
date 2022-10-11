<?php

declare(strict_types=1);

namespace App\Inertable\Client;

use App\Models\Suggestion;
use App\Abstracts\Inertable;
use App\Enums\SuggestionStatus;
use Rizkhal\Inertable\Column;
use Illuminate\Database\Eloquent\Builder;

class SuggestionTable extends Inertable
{
    public function __construct(
        private SuggestionStatus | null $status = null
    ) {
        // 
    }

    public function query(): Builder
    {
        return Suggestion::query()
            ->when(
                $this->status,
                fn (Builder $query) => $query->where('status', $this->status->value)
            )
            ->when(
                !$this->hasSort(),
                fn (Builder $query) => $query->orderBy('created_at', 'desc')
            );
    }

    public function columns(): array
    {
        return [
            Column::make('id', 'id'),
            Column::make('nama', 'name')->searchable()->sortable(),
            Column::make('email', 'email')->searchable()->sortable(),
            Column::make('masukan', 'suggestion')->searchable()->sortable(),
            Column::make('dibuat', 'created_at')->searchable()->sortable()
                ->format(fn ($row) => $row->created_at->diffForHumans()),
        ];
    }
}
