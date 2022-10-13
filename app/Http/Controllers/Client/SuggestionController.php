<?php

namespace App\Http\Controllers\Client;

use App\Actions\SuggestionAction;
use Illuminate\Http\Request;
use App\Enums\SuggestionStatus;
use Illuminate\Routing\Controller;
use App\Inertable\Client\SuggestionTable;

class SuggestionController extends Controller
{
    public function index(Request $request)
    {
        return inertia('client/suggestion/index2', [
            'item' => SuggestionAction::execute($request->get('id')),
        ]);
    }

    public function selected()
    {
        return inertia('client/suggestion/selected')
            ->inertable(new SuggestionTable(SuggestionStatus::SELECTED))
            ->title('Daftar Masukan');
    }
}
