<?php

namespace App\Providers;

use App\Interface\DeveloperInterface;
use App\Repository\DeveloperRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DeveloperInterface::class,DeveloperRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
