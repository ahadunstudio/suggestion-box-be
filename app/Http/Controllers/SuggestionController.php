<?php

namespace App\Http\Controllers;

use App\Inertable\SuggestionTable;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function index()
    {
        return inertia('suggestion/index')
            ->inertable(new SuggestionTable);
    }
}
