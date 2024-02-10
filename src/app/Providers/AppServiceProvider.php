<?php

namespace App\Providers;

use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\SocialRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SocialRepositoryInterface::class,
            SocialRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
