<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ServiceProvider;
use Inertia\Response as InertiaResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('ID');

        InertiaResponse::macro('title', function ($title) {
            return $this->with('title', $title);
        });

        RedirectResponse::macro('success', function (string $message) {
            $this->with(['success' => $message]);

            return $this;
        });

        RedirectResponse::macro('info', function (string $message) {
            $this->with(['info' => $message]);

            return $this;
        });

        RedirectResponse::macro('warning', function (string $message) {
            $this->with(['warning' => $message]);

            return $this;
        });

        RedirectResponse::macro('error', function (string $message, $context = []) {
            if (!empty($context)) {
                Log::error($message, $context);
            }

            $this->with(['error' => $message]);

            return $this;
        });

        RedirectResponse::macro('print', function (string $url) {
            $this->with(['print' => $url]);

            return $this;
        });
    }
}
