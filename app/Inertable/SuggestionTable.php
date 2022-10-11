<?php

declare(strict_types=1);

namespace App\Inertable;

use App\Models\Suggestion;
use App\Abstracts\Inertable;
use App\Enums\SuggestionStatus;
use Rizkhal\Inertable\Column;
use App\Overrides\Inertable\Filter;
use Illuminate\Database\Eloquent\Builder;

class SuggestionTable extends Inertable
{
    public function query(): Builder
    {
        return Suggestion::query()
            ->when(
                !$this->hasSort(),
                fn (Builder $query) => $query->orderBy('created_at', 'desc')
            )
            ->when(
                $this->getFilter('status'),
                fn (Builder $query, $status) => $query->where('status', $status)
            );
    }

    public function columns(): array
    {
        return [
            Column::checkbox(),
            Column::make('nama', 'name')->searchable()->sortable(),
            Column::make('email', 'email')->searchable()->sortable(),
            Column::make('masukan', 'suggestion')->searchable()->sortable(),
            Column::make('status', 'status')->searchable()->sortable()->format(fn ($row) => [
                'value' => $row->status->value,
                'label' => $row->status->label(),
            ]),
            Column::make('created_at', 'created_at')->searchable()->sortable()
                ->format(fn ($row) => $row->created_at->diffForHumans()),
        ];
    }

    public function fields(): array
    {
        return [
            'status' => Filter::make('Status')->select()->setAttributes(SuggestionStatus::labels()),
        ];
    }
}
