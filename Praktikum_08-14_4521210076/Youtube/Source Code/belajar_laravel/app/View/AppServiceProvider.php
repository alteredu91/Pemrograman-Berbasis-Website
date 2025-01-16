<?php

namespace App\Providers;

use App\Models\Store;
use App\Observers\StoreObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Store::observe(StoreObserver::class);
    }
}