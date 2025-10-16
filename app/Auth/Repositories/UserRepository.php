<?php
declare(strict_types=1);

namespace App\Auth\Repositories;

use App\Auth\Contracts\IUserRepository;
use App\Auth\Models\User;
use App\Auth\ValueObjects\CreateUserVO;
use App\Auth\ValueObjects\SearchUserVO;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function getActiveUsersPaginated(SearchUserVO $searchUserVO): LengthAwarePaginator
    {
        $query = User::query()
            ->whereNot('id', auth()->id())
            ->whereNotNull('email_verified_at')
            ->orderBy($searchUserVO->sort->value, $searchUserVO->direction->value);

        if (null != $searchUserVO->query) {
            $query->where($searchUserVO->searchBy->value, 'like', "%{$searchUserVO->query}%");
        }

        return $query->paginate(
            $searchUserVO->limit,
            ['id', 'name', 'email'],
            'page',
            $searchUserVO->page
        );
    }
}
