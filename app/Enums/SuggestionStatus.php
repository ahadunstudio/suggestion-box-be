<?php

namespace App\Enums;

use App\Enums\Traits\InvokableCases;
use Illuminate\Support\Collection;

enum SuggestionStatus: int
{
    use InvokableCases;

    case NOT_SELECTED = 1;
    case SELECTED = 2;

    public function label(): string
    {
        return match ($this) {
            self::NOT_SELECTED => 'Tidak Dipilih',
            self::SELECTED => 'Dipilih',
        };
    }

    public static function labels(): Collection
    {
        return collect(self::cases())->map(function (self $value): array {
            return [
                'value' => $value->value,
                'label' => $value->label(),
            ];
        });
    }
}
