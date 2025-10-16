<?php
declare(strict_types=1);

namespace App\Auth\Services;

use App\Auth\Contracts\IUserRepository;
use App\Auth\Contracts\IUserService;
use App\Auth\Models\User;
use App\Auth\ValueObjects\CreateUserVO;

readonly class UserService implements IUserService
{
    public function __construct(
        private IUserRepository $userRepository,
    )
    {
    }

    public function findByIdOrFail(int $id): User
    {
        return $this->userRepository->findOrFail($id);
    }

    public function create(CreateUserVO $createUserVO): ?User
    {
        return $this->userRepository->create($createUserVO);
    }
}
