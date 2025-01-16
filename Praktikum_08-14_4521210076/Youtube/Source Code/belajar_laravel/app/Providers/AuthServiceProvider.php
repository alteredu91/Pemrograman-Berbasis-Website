<?php

namespace App\Providers;

use App\Models\Store;
use App\Policies\StorePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Store::class => StorePolicy::class,
    ];

    public function boot(): void
    {
        Gate::define('admin', function ($user) {
            return $user->email === 'admin@example.com';
        });
    }
}
