<?php

namespace App\Providers;

use App\Repositories\AccessModifierRepository;
use App\Repositories\ComplaintRepository;
use App\Repositories\ExpirationTimeRepository;
use App\Repositories\Interfaces\AccessModifierRepositoryInterface;
use App\Repositories\Interfaces\ComplaintRepositoryInterface;
use App\Repositories\Interfaces\ExpirationTimeRepositoryInterface;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\Interfaces\TypeRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PasteRepository;
use App\Repositories\SocialRepository;
use App\Repositories\TypeRepository;
use App\Repositories\UserRepository;
use App\Services\AccessModifierService;
use App\Services\ComplaintService;
use App\Services\ExpirationTimeService;
use App\Services\interfaces\AccessModifierServiceInterface;
use App\Services\interfaces\ComplaintServiceInterface;
use App\Services\interfaces\ExpirationTimeServiceInterface;
use App\Services\interfaces\PasteServiceInterface;
use App\Services\interfaces\SocialServiceInterface;
use App\Services\interfaces\TypeServiceInterface;
use App\Services\interfaces\UserServiceInterface;
use App\Services\PasteService;
use App\Services\SocialService;
use App\Services\TypeService;
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
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );

        $this->app->bind(
            TypeRepositoryInterface::class,
            TypeRepository::class
        );

        $this->app->bind(
            TypeServiceInterface::class,
            TypeService::class
        );

        $this->app->bind(
            AccessModifierRepositoryInterface::class,
            AccessModifierRepository::class
        );

        $this->app->bind(
            AccessModifierServiceInterface::class,
            AccessModifierService::class
        );

        $this->app->bind(
            ExpirationTimeRepositoryInterface::class,
            ExpirationTimeRepository::class
        );

        $this->app->bind(
            ExpirationTimeServiceInterface::class,
            ExpirationTimeService::class
        );

        $this->app->bind(
            ComplaintRepositoryInterface::class,
            ComplaintRepository::class
        );

        $this->app->bind(
            ComplaintServiceInterface::class,
            ComplaintService::class
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
