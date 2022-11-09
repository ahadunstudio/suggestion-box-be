<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return inertia('dashboard')->with([
            'cards' => static::cards(),
        ]);
    }

    public static function cards()
    {
        return [
            [
                'color' => 'green',
                'label' => 'Total Peserta Online',
                'value' => Suggestion::query()->online()->count(),
            ],
            [
                'color' => 'indigo',
                'label' => 'Total Peserta Offline',
                'value' => Suggestion::query()->offline()->count(),
            ],
            [
                'color' => 'blue',
                'label' => 'Total Peserta',
                'value' => Suggestion::query()->count(),
            ]
        ];
    }
}
