<?php
declare(strict_types=1);

namespace App\Friendship\Repositories;

use App\Auth\Models\User;
use App\Friendship\Contracts\IFriendshipRepository;
use App\Friendship\Enums\FriendshipStatusEnum;
use App\Friendship\Models\Friendship;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class FriendshipRepository implements IFriendshipRepository
{
    public function getFriendsByUserIdAndStatus(int $userId, FriendshipStatusEnum $status): Collection
    {
        return User::whereHas('friendshipsAsUser', function ($query) use ($userId, $status) {
            $query->where('friend_id', $userId)
                ->where('status', $status->value);
        })->get();
    }

    public function getReceivedFriendRequests(int $userId): Collection
    {
        return User::join('friendships', 'users.id', '=', 'friendships.user_id')
            ->where('friendships.friend_id', $userId)
            ->where('friendships.status', FriendshipStatusEnum::Pending->value)
            ->select('users.*', 'friendships.created_at as request_sent_at')
            ->get();
    }

    public function getSentFriendRequests(int $userId): Collection
    {
        return User::join('friendships', 'users.id', '=', 'friendships.friend_id')
            ->where('friendships.user_id', $userId)
            ->where('friendships.status', FriendshipStatusEnum::Pending->value)
            ->select('users.*', 'friendships.created_at as request_sent_at')
            ->get();
    }

    public function exists(int $userId, int $friendId, ?FriendshipStatusEnum $status = null): bool
    {
        $query = Friendship::where('user_id', $userId)
            ->where('friend_id', $friendId);

        if ($status !== null) {
            $query->where('status', $status->value);
        }

        return $query->exists();
    }

    public function findFriendship(int $userId, int $friendId): ?Friendship
    {
        return Friendship::where('user_id', $userId)
            ->where('friend_id', $friendId)
            ->first();
    }

    public function createRequest(int $userId, int $friendId): Friendship
    {
        return Friendship::create([
            'user_id' => $userId,
            'friend_id' => $friendId,
            'status' => FriendshipStatusEnum::Pending->value,
        ]);
    }

    public function acceptRequest(int $requesterId, int $receiverId): void
    {
        DB::transaction(function () use ($requesterId, $receiverId) {
            // Update original request
            Friendship::where('user_id', $requesterId)
                ->where('friend_id', $receiverId)
                ->where('status', FriendshipStatusEnum::Pending->value)
                ->update(['status' => FriendshipStatusEnum::Accepted->value]);

            // Create reciprocal friendship
            Friendship::create([
                'user_id' => $receiverId,
                'friend_id' => $requesterId,
                'status' => FriendshipStatusEnum::Accepted->value,
            ]);
        });
    }

    public function rejectRequest(int $requesterId, int $receiverId): void
    {
        Friendship::where('user_id', $requesterId)
            ->where('friend_id', $receiverId)
            ->where('status', FriendshipStatusEnum::Pending->value)
            ->update(['status' => FriendshipStatusEnum::Rejected->value]);
    }

    public function deleteFriendship(int $userId, int $friendId): void
    {
        DB::transaction(function () use ($userId, $friendId) {
            Friendship::where(function ($query) use ($userId, $friendId) {
                $query->where('user_id', $userId)->where('friend_id', $friendId);
            })->orWhere(function ($query) use ($userId, $friendId) {
                $query->where('user_id', $friendId)->where('friend_id', $userId);
            })->delete();
        });
    }
}
