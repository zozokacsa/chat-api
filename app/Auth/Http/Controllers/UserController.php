<?php
declare(strict_types=1);

namespace App\Auth\Http\Controllers;

use App\Auth\Contracts\IUserService;
use App\Auth\Enums\UserSearchableColumnEnum;
use App\Auth\Enums\UserSortableColumnEnum;
use App\Auth\Http\Requests\UserSearchRequest;
use App\Auth\Http\Resources\UserResource;
use App\Auth\ValueObjects\SearchUserVO;
use App\Shared\Enums\SortDirectionEnum;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function __construct(
        public readonly IUserService $userService,
    )
    {
    }

    public function list(UserSearchRequest $request): AnonymousResourceCollection
    {
        $searchUserVO = new SearchUserVO(
            query: $request->validated('query'),
            searchBy: UserSearchableColumnEnum::from($request->validated('search_by', UserSearchableColumnEnum::Name->value)),
            page: (int)$request->validated('page', 1),
            limit: (int)$request->validated('limit', 10),
            sort: UserSortableColumnEnum::from($request->validated('sort', UserSortableColumnEnum::Id->value)),
            direction: SortDirectionEnum::from($request->validated('direction', SortDirectionEnum::Desc->value)),
        );

        $users = $this->userService->getActiveUsersList($searchUserVO);

        return UserResource::collection($users);
    }
}
