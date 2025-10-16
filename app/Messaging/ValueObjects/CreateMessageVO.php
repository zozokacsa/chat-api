<?php
declare(strict_types=1);

namespace App\Messaging\ValueObjects;

readonly class CreateMessageVO
{
    public function __construct(
        public int    $senderId,
        public int    $receiverId,
        public string $message,
    )
    {
    }
}
