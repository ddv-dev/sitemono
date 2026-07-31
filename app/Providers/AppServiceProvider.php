<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FaqService;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FaqService::class, function ($app) {
            return new FaqService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
