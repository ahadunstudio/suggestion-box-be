<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use App\Enums\SuggestionStatus;
use App\Events\SuggestionSelectedEvent;
use App\Inertable\SuggestionTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SuggestionStatusRequest;

class SuggestionController extends Controller
{
    public function index()
    {
        return inertia('suggestion/index')
            ->with(['statuses' => SuggestionStatus::labels()])
            ->inertable(new SuggestionTable)->title('Kelola Masukan');
    }

    public function statuses(SuggestionStatusRequest $request)
    {
        DB::transaction(function () use ($request) {
            $request->getSuggestions()->update([
                'status' => $request->status,
            ]);
        });

        return back()->success(__("Berhasil mengatur status masukan."));
    }

    public function status(Suggestion $suggestion)
    {
        DB::transaction(function () use ($suggestion) {
            Suggestion::query()->selected()->where('id', '!=', $suggestion->id)->update([
                'status' => SuggestionStatus::NOT_SELECTED(),
            ]);

            $suggestion->update([
                'status' => SuggestionStatus::SELECTED(),
            ]);

            event(new SuggestionSelectedEvent($suggestion));
        });

        return back()->success(__("Berhasil mengatur pilihan."));
    }

    public function delete(Request $request)
    {
        DB::transaction(fn () => Suggestion::whereIn('id', $request->selected)->delete());

        return back()->success(__("Berhasil menghapus masukan."));
    }
}
