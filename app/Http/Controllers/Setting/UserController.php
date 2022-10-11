<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\ResetPasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function password(ResetPasswordRequest $request)
    {
        DB::transaction(fn () => $request->user()->update(['password' => $request->getPassword()]));

        Auth::logout();

        return redirect()->route('auth.login');
    }
}
