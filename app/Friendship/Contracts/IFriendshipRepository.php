<?php

namespace App\Friendship\Contracts;

use App\Friendship\Enums\FriendshipStatusEnum;
use App\Friendship\Models\Friendship;
use App\Auth\Models\User;
use Illuminate\Support\Collection;

interface IFriendshipRepository
{
    /**
     * Get friends by user ID and status
     *
     * @param int $userId
     * @param FriendshipStatusEnum $status
     * @return Collection<User>
     */
    public function getFriendsByUserIdAndStatus(int $userId, FriendshipStatusEnum $status): Collection;

    /**
     * Get pending friend requests received by user
     *
     * @param int $userId
     * @return Collection<User>
     */
    public function getReceivedFriendRequests(int $userId): Collection;

    /**
     * Get pending friend requests sent by user
     *
     * @param int $userId
     * @return Collection<User>
     */
    public function getSentFriendRequests(int $userId): Collection;

    /**
     * Check if friendship exists between two users
     *
     * @param int $userId
     * @param int $friendId
     * @param FriendshipStatusEnum|null $status
     * @return bool
     */
    public function exists(int $userId, int $friendId, ?FriendshipStatusEnum $status = null): bool;

    /**
     * Find friendship between two users
     *
     * @param int $userId
     * @param int $friendId
     * @return Friendship|null
     */
    public function findFriendship(int $userId, int $friendId): ?Friendship;

    /**
     * Create a friendship request
     *
     * @param int $userId
     * @param int $friendId
     * @return Friendship
     */
    public function createRequest(int $userId, int $friendId): Friendship;

    /**
     * Accept a friendship request
     *
     * @param int $requesterId
     * @param int $receiverId
     * @return void
     */
    public function acceptRequest(int $requesterId, int $receiverId): void;

    /**
     * Reject a friendship request
     *
     * @param int $requesterId
     * @param int $receiverId
     * @return void
     */
    public function rejectRequest(int $requesterId, int $receiverId): void;

    /**
     * Delete friendship (both directions)
     *
     * @param int $userId
     * @param int $friendId
     * @return void
     */
    public function deleteFriendship(int $userId, int $friendId): void;
}
