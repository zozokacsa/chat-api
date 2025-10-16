<?php
declare(strict_types=1);

namespace App\Friendship\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class PendingRequestExistsException extends HttpException
{
    public function __construct()
    {
        parent::__construct(400, __('friendships.pending_request_exists'));
    }
}
