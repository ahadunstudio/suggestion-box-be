<?php

namespace App\Models;

use App\Enums\Participant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Suggestion extends Model
{
    protected $guarded = [];

    protected $casts = [
        'participant' => Participant::class,
    ];

    public function scopeOnline(Builder $query): void
    {
        $query->where('status', Participant::ONLINE());
    }

    public function scopeOffline(Builder $query): void
    {
        $query->where('status', Participant::OFFLINE());
    }
}
