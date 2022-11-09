<?php

namespace App\Providers;

use App\Facades\Navigator as Nav;
use Illuminate\Support\ServiceProvider;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(function () {
            return [
                Nav::item(__('Beranda'))
                    ->for('admin.dashboard')
                    ->icon('HomeIcon'),

                Nav::item(__('Peserta'))
                    ->for('admin.suggestions.index')
                    ->icon('UserGroupIcon'),
            ];
        });
    }
}
