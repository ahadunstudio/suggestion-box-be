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
                'color' => 'indigo',
                'label' => 'Total Masukan',
                'value' => Suggestion::count(),
            ],
            [
                'color' => 'blue',
                'label' => 'Masukan Dipilih',
                'value' => Suggestion::query()->selected()->count(),
            ],
            [
                'color' => 'red',
                'label' => 'Masukan Tidak Dipilih',
                'value' => Suggestion::query()->notSelected()->count(),
            ]
        ];
    }
}
