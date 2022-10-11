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

                Nav::item(__('Masukan'))
                    ->for('admin.suggestions.index')
                    ->icon('InboxIcon'),

                Nav::item(__('Pengaturan'))
                    ->for('admin.setting.index')
                    ->icon('Cog6ToothIcon'),
            ];
        });
    }
}
