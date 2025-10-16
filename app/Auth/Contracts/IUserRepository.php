<?php
declare(strict_types=1);

namespace App\Auth\Contracts;

use App\Auth\Models\User;
use App\Auth\ValueObjects\CreateUserVO;
use App\Auth\ValueObjects\SearchUserVO;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

interface IUserRepository
{
    /**
     * Find a user by ID or fail.
     *
     * @param int $id The ID of the user to retrieve.
     *
     * @return User The found user model.
     *
     * @throws ModelNotFoundException If no user exists with the given ID.
     */
    public function findOrFail(int $id): User;

    /**
     * Create a new user.
     *
     * @param CreateUserVO $createUserVO Value object containing user creation data.
     *
     * @return User|null The created user model, or null if creation failed.
     */
    public function create(CreateUserVO $createUserVO): ?User;

    /**
     * Retrieve a paginated list of active users based on search criteria.
     *
     * @param SearchUserVO $searchUserVO Value object containing search and filter parameters.
     *
     * @return LengthAwarePaginator Paginated collection of active User models.
     */
    public function getActiveUsersPaginated(SearchUserVO $searchUserVO): LengthAwarePaginator;
}
