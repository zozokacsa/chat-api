<?php
declare(strict_types=1);

namespace App\Auth\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class UserNotVerifiedException extends HttpException
{
    public function __construct()
    {
        parent::__construct(401, __('auth.not_veified'));
    }
}
