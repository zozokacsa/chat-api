<?php
declare(strict_types=1);

namespace App\Auth\Contracts;

use App\Auth\Exceptions\InvalidCredentialsException;
use App\Auth\Exceptions\UserNotVerifiedException;
use App\Auth\Models\User;
use App\Auth\ValueObjects\CreateUserVO;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface IAuthService
{
    public function register(CreateUserVO $createUserVO): void;

    /**
     * @throws InvalidCredentialsException
     */
    public function loginWithEmailAndPassword(
        string $email,
        string $password
    ): Authenticatable;

    /**
     * @throws UserNotVerifiedException
     */
    public function checkUserIsVerified(User $user): void;

    public function createToken(User $user): string;

    /**
     * @throws ModelNotFoundException 
     */
    public function verifyUserById(int $id): void;
}
