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
    /**
     * Register a new user in the system.
     *
     * @param CreateUserVO $createUserVO Value object containing user registration data.
     *
     * @return void
     */
    public function register(CreateUserVO $createUserVO): void;

    /**
     * Authenticate a user with email and password.
     *
     * @param string $email User's email address.
     * @param string $password User's password.
     *
     * @return Authenticatable The authenticated user model.
     *
     * @throws InvalidCredentialsException If the provided credentials are invalid.
     */
    public function loginWithEmailAndPassword(string $email, string $password): Authenticatable;

    /**
     * Check if a user has verified their account.
     *
     * @param User $user The user to check.
     *
     * @return void
     *
     * @throws UserNotVerifiedException If the user has not completed verification.
     */
    public function checkUserIsVerified(User $user): void;

    /**
     * Create an authentication token for the given user.
     *
     * @param User $user The user for whom the token is generated.
     *
     * @return string The generated token.
     */
    public function createToken(User $user): string;

    /**
     * Verify a user by their ID.
     *
     * @param int $id The ID of the user to verify.
     *
     * @return void
     *
     * @throws ModelNotFoundException If no user exists with the given ID.
     */
    public function verifyUserById(int $id): void;
}
