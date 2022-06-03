<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Interfaces\ItemRepositoryInterface::class,
            \App\Repositories\ItemRepository::class,
        );
        $this->app->bind(
            \App\Interfaces\StockRepositoryInterface::class,
            \App\Repositories\StockRepository::class,
        );
        $this->app->bind(
            \App\Interfaces\OrderHistoriesRepositoryInterface::class,
            \App\Repositories\OrderHistoriesRepository::class,
        );
        $this->app->bind(
            \App\Interfaces\AdminRepositoryInterface::class,
            \App\Repositories\AdminRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
