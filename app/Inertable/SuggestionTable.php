<?php

declare(strict_types=1);

namespace App\Inertable;

use App\Models\Suggestion;
use App\Abstracts\Inertable;
use App\Enums\Participant;
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
                $this->getFilter('participant'),
                fn (Builder $query, $participant) => $query->where('participant', $participant)
            );
    }

    public function columns(): array
    {
        return [
            Column::checkbox(),
            Column::make('nama', 'name')->searchable()->sortable(),
            Column::make('nip', 'nip')->searchable()->sortable(),
            Column::make('unit', 'unit')->searchable()->sortable(),
            Column::make('jabatan', 'rank')->searchable()->sortable(),
            Column::make('peserta', 'participant')->searchable()->sortable()->format(fn ($row) => [
                'value' => $row->participant->value,
                'label' => $row->participant->label(),
            ]),
            Column::make('created_at', 'created_at')->searchable()->sortable()
                ->format(fn ($row) => $row->created_at->diffForHumans()),
        ];
    }

    public function fields(): array
    {
        return [
            'participant' => Filter::make('Status')->select()->setAttributes(Participant::labels()),
        ];
    }
}
