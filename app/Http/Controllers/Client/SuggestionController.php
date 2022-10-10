<?php

namespace App\Http\Controllers\Client;

use App\Enums\SuggestionStatus;
use App\Inertable\Client\SuggestionTable;
use Illuminate\Routing\Controller;

class SuggestionController extends Controller
{
    public function index()
    {
        return inertia('client/suggestion/index')
            ->inertable(new SuggestionTable())
            ->title('Daftar Masukan');
    }

    public function selected()
    {
        return inertia('client/suggestion/selected')
            ->inertable(new SuggestionTable(SuggestionStatus::SELECTED))
            ->title('Daftar Masukan');
    }
}
