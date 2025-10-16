<?php
declare(strict_types=1);

namespace App\Auth\Enums;

enum UserSearchableColumnEnum: string
{
    case Name = 'name';
    case Email = 'eamil';
}
