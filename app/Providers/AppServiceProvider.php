<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\League;
use Illuminate\Pagination\Paginator;
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

        Paginator::useBootstrapFive();

        View::composer('app.nav', function ($view) {
            $leagues = League::orderBy('name')
                ->get();

            $view->with([
                'leagues' => $leagues,
            ]);
        });
    }
}
