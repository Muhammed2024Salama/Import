<?php

namespace App\Providers;

use App\Interface\DeveloperInterface;
use App\Interface\ImportDeveloperInterface;
use App\Repository\DeveloperRepository;
use App\Repository\ImportDeveloperRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DeveloperInterface::class,DeveloperRepository::class);
        $this->app->bind(ImportDeveloperInterface::class,ImportDeveloperRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
