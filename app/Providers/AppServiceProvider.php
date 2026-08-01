<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\CompanySetting;
use App\Models\Document;
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
    public function boot(): void
    {
        // Реквизиты и контакты компании доступны во всех шаблонах как $company
        $company = null;

        try {
            if (Schema::hasTable('company_settings')) {
                $company = CompanySetting::current();
            }
        } catch (\Throwable $e) {
            // БД ещё не готова (например, во время миграций)
        }

        View::share('company', $company ?? new CompanySetting(CompanySetting::DEFAULTS));

        // Документы и сертификаты для страницы «О заводе»
        View::composer('about.documents', function ($view) {
            $documents = collect();

            try {
                if (Schema::hasTable('documents')) {
                    $documents = Document::query()->active()->ordered()->get();
                }
            } catch (\Throwable $e) {
                // БД ещё не готова
            }

            $view->with('documents', $documents);
        });
    }
}
