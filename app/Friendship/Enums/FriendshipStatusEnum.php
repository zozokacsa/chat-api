<?php
declare(strict_types=1);

namespace App\Friendship\Enums;

enum FriendshipStatusEnum: string
{
    case Accepted = 'accepted';
    case Rejected = 'rejected';
    case Pending = 'pending';

    public static function values(): array
    {
        return array_map(fn (self $enum) => $enum->value, self::cases());
    }
}
