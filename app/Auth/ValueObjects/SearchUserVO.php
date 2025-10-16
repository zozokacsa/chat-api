<?php
declare(strict_types=1);

namespace App\Auth\ValueObjects;

use App\Auth\Enums\UserSearchableColumnEnum;
use App\Auth\Enums\UserSortableColumnEnum;
use App\Shared\Enums\SortDirectionEnum;

readonly class SearchUserVO
{
    public function __construct(
        public ?string $query,
        public UserSearchableColumnEnum $searchBy = UserSearchableColumnEnum::Name,
        public int $page = 1,
        public int $limit = 10,
        public UserSortableColumnEnum $sort = UserSortableColumnEnum::Id,
        public SortDirectionEnum $direction = SortDirectionEnum::Desc,
    )
    {
    }
}
