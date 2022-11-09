<?php

namespace App\Enums;

use App\Enums\Traits\InvokableCases;
use Illuminate\Support\Collection;

enum Participant: int
{
    use InvokableCases;

    case ONLINE = 1;
    case OFFLINE = 2;

    public function label(): string
    {
        return match ($this) {
            self::ONLINE => 'Online',
            self::OFFLINE => 'Offline',
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
