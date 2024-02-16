<?php

namespace App\Providers;

use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PasteRepository;
use App\Repositories\SocialRepository;
use App\Repositories\UserRepository;
use App\Services\interfaces\PasteServiceInterface;
use App\Services\interfaces\SocialServiceInterface;
use App\Services\interfaces\UserServiceInterface;
use App\Services\PasteService;
use App\Services\SocialService;
use App\Services\UserService;
use Illuminate\Pagination\Paginator;
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

        $this->app->bind(
            PasteServiceInterface::class,
            PasteService::class
        );

        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-5');
    }
}
