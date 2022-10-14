<?php

namespace App\Http\Controllers\Client;

use Illuminate\Routing\Controller;

class SuggestionController extends Controller
{
    public function index()
    {
        return inertia('client/suggestion/index2');
    }

    public function selected()
    {
        return inertia('client/suggestion/selected2');
    }
}
