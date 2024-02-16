<?php

namespace App\Providers;

use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\PasteRepository;
use App\Repositories\SocialRepository;
use App\Services\interfaces\SocialServiceInterface;
use App\Services\SocialService;
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

        $this->app->bind(
            SocialServiceInterface::class,
            SocialService::class
        );

        $this->app->bind(
            PasteRepositoryInterface::class,
            PasteRepository::class
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
