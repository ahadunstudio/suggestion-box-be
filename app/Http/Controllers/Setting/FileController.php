<?php

namespace App\Http\Controllers\Setting;

use App\Models\Setting\File;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\FileRequest;

class FileController extends Controller
{
    public function store(FileRequest $request)
    {
        DB::transaction(function () use ($request) {
            if ($file = File::first()) {
                $file->update($request->getData());
            } else {
                File::create($request->getData());
            }
        });

        return back()->success(__("Berhasil mengatur file."));
    }

    public function show(File $file)
    {
        return response()->file(
            public_path("storage/{$file->filename}")
        );
    }
}
