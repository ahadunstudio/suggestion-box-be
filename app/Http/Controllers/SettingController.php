<?php

namespace App\Http\Controllers;

use App\Events\RouterEvent;
use App\Models\SuggestionSetting;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    public function index()
    {
        return inertia('setting/index', [
            'setting' => SuggestionSetting::first(),
        ])->title('Pengaturan');
    }

    public function store(SettingRequest $request)
    {
        DB::transaction(function () use ($request) {
            if ($request->hasSetting()) {
                $setting = $request->setting();

                $setting->update($request->getScreen());

                event(new RouterEvent($setting));
            } else {
                $setting = SuggestionSetting::create($request->getScreen());
                event(new RouterEvent($setting));
            }
        });

        return back()->success(__("Berhasil mengatur antar muka pengguna."));
    }
}
