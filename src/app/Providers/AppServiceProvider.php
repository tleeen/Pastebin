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
     * All the container bindings that should be registered.
     *
     * @var array<mixed>
     */
    public array $bindings = [
        SocialRepositoryInterface::class => SocialRepository::class,
        SocialServiceInterface::class => SocialService::class,

        PasteRepositoryInterface::class => PasteRepository::class,
        PasteServiceInterface::class => PasteService::class,

        UserRepositoryInterface::class => UserRepository::class,
        UserServiceInterface::class => UserService::class,

        TypeRepositoryInterface::class => TypeRepository::class,
        TypeServiceInterface::class => TypeService::class,

        AccessModifierRepositoryInterface::class => AccessModifierRepository::class,
        AccessModifierServiceInterface::class => AccessModifierService::class,

        ExpirationTimeRepositoryInterface::class => ExpirationTimeRepository::class,
        ExpirationTimeServiceInterface::class => ExpirationTimeService::class,

        ComplaintRepositoryInterface::class => ComplaintRepository::class,
        ComplaintServiceInterface::class => ComplaintService::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-5');
    }
}
