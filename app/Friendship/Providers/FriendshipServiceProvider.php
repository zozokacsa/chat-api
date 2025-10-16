<?php
declare(strict_types=1);

namespace App\Friendship\Providers;

use App\Friendship\Contracts\IFriendshipRepository;
use App\Friendship\Contracts\IFriendshipService;
use App\Friendship\Repositories\FriendshipRepository;
use App\Friendship\Services\FriendshipService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FriendshipServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(IFriendshipRepository::class, FriendshipRepository::class);
        $this->app->bind(IFriendshipService::class, FriendshipService::class);
    }

    public function provides(): array
    {
        return [
            IFriendshipRepository::class,
            IFriendshipService::class,
        ];
    }
}
