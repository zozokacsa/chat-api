<?php
declare(strict_types=1);

namespace App\Auth\ValueObjects;

readonly class CreateUserVO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    )
    {
    }
}
