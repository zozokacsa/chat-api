<?php
declare(strict_types=1);

namespace App\Auth\Services;

use App\Auth\Contracts\IAuthService;
use App\Auth\Contracts\IUserService;
use App\Auth\Exceptions\InvalidCredentialsException;
use App\Auth\Exceptions\UserNotVerifiedException;
use App\Auth\Models\User;
use App\Auth\ValueObjects\CreateUserVO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Events\Registered;

class AuthService implements IAuthService
{
    public function __construct(
        private readonly IUserService $userService
    )
    {
    }

    public function register(CreateUserVO $createUserVO): void
    {
        $user = $this->userService->create($createUserVO);

        event(new Registered($user));
    }

    public function loginWithEmailAndPassword(
        string $email,
        string $password
    ): Authenticatable
    {
        if (!Auth::attempt([
            'email' => $email,
            'password' => $password
        ])) {
            throw new InvalidCredentialsException();
        }

        return Auth::user();
    }

    public function checkUserIsVerified(User $user): void
    {
        if (!$user->hasVerifiedEmail()) {
            throw new UserNotVerifiedException();
        }
    }

    public function createToken(User $user): string
    {
        return $user->createToken('api_token')->plainTextToken;
    }

    public function verifyUserById(int $id): void
    {
        $user = $this->userService->findByIdOrFail($id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
    }
}
