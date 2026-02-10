<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share header and footer pages with all views
        View::composer(['components.header', 'components.footer'], function ($view) {
            $view->with('headerPages', Page::active()->header()->orderBy('title')->get());
            $view->with('footerPages', Page::active()->footer()->orderBy('title')->get());
        });
    }
}
