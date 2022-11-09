<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Suggestion;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\SuggestionRequest;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SuggestionJsonController extends Controller
{
    public function __invoke(SuggestionRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $suggestion = Suggestion::create($request->validated());

            return response()->json([
                'success' => true,
                'message' => __('Berhasil memberikan masukan'),
            ], Response::HTTP_CREATED);
        });
    }
}
