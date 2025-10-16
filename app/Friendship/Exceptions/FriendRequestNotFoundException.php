<?php
declare(strict_types=1);

namespace App\Friendship\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class FriendRequestNotFoundException extends HttpException
{
    public function __construct()
    {
        parent::__construct(404, __('friendships.request_not_found'));
    }
}
