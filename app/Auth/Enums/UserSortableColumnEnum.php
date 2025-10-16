<?php
declare(strict_types=1);

namespace App\Auth\Enums;

enum UserSortableColumnEnum: string
{
    case Id = 'id';
    case Name = 'name';
    case Email = 'email';
}
