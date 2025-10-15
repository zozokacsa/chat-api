<?php
declare(strict_types=1);

namespace App\Auth\Repositories;

use App\Auth\Contracts\IUserRepository;
use App\Auth\Models\User;
use App\Auth\ValueObjects\CreateUserVO;

class UserRepository implements IUserRepository
{
    public function findOrFail(int $id): User
    {
        return User::findOrFail($id);
    }

    public function create(CreateUserVO $createUserVO): ?User
    {
        return User::create([
            'name' => $createUserVO->name,
            'email' => $createUserVO->email,
            'password' => $createUserVO->password
        ]);
    }
}
