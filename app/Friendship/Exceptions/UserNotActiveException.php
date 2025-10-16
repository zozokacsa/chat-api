<?php
declare(strict_types=1);

namespace App\Friendship\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class UserNotActiveException extends HttpException
{
    public function __construct()
    {
        parent::__construct(400, __('friendships.cannot_friend_inactive_user'));
    }
}
