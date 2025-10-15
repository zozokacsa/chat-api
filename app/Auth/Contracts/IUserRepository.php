<?php
declare(strict_types=1);

namespace App\Auth\Contracts;

use App\Auth\Models\User;
use App\Auth\ValueObjects\CreateUserVO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface IUserRepository
{
    /**
     * @throws ModelNotFoundException 
     */
    public function findOrFail(int $id): User;
    public function create(CreateUserVO $createUserVO): ?User;
}
