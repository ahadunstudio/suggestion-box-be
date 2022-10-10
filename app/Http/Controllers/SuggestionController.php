<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\SuggestionStatus;
use App\Inertable\SuggestionTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SuggestionStatusRequest;
use App\Models\Suggestion;

class SuggestionController extends Controller
{
    public function index()
    {
        return inertia('suggestion/index')
            ->with(['statuses' => SuggestionStatus::labels()])
            ->inertable(new SuggestionTable)->title('Kelola Masukan');
    }

    public function status(SuggestionStatusRequest $request)
    {
        DB::transaction(function () use ($request) {
            $request->getSuggestions()->update([
                'status' => $request->status,
            ]);
        });

        return back()->success(__("Berhasil mengatur status masukan."));
    }

    public function delete(Request $request)
    {
        DB::transaction(fn () => Suggestion::whereIn('id', $request->selected)->delete());

        return back()->success(__("Berhasil menghapus masukan."));
    }
}
