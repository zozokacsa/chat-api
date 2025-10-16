<?php
declare(strict_types=1);

namespace App\Messaging\Providers;

use App\Messaging\Contracts\IMessageRepository;
use App\Messaging\Contracts\IMessageService;
use App\Messaging\Repositories\MessageRepository;
use App\Messaging\Services\MessageService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MessagingServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->bind(IMessageRepository::class, MessageRepository::class);
        $this->app->bind(IMessageService::class, MessageService::class);
    }

    public function provides(): array
    {
        return [
            IMessageRepository::class,
            IMessageService::class,
        ];
    }
}
