<?php

namespace App\Models;

use App\Enums\SuggestionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Suggestion extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => SuggestionStatus::class,
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->fill([
                'status' => SuggestionStatus::NOT_SELECTED(),
            ]);
        });
    }

    public function scopeSelected(Builder $query): void
    {
        $query->where('status', SuggestionStatus::SELECTED());
    }

    public function scopeNotSelected(Builder $query): void
    {
        $query->where('status', SuggestionStatus::NOT_SELECTED());
    }
}
