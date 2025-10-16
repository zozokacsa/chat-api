<?php
declare(strict_types=1);

namespace App\Auth\Providers;

use App\Auth\Contracts\IAuthService;
use App\Auth\Contracts\IUserRepository;
use App\Auth\Contracts\IUserService;
use App\Auth\Repositories\UserRepository;
use App\Auth\Services\AuthService;
use App\Auth\Services\UserService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IAuthService::class, AuthService::class);
    }

    public function provides(): array
    {
        return [
            IUserRepository::class,
            IUserService::class,
            IAuthService::class,
        ];
    }
}
