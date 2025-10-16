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

    /**
     * Determine whether two users are mutual (accepted) friends.
     *
     * A mutual friendship means both users have accepted each other.
     * This method checks if two reciprocal records exist in the
     * `friendships` table with status = 'accepted':
     *   - one where user_id = $userId and friend_id = $friendId
     *   - one where user_id = $friendId and friend_id = $userId
     *
     * @param int $userId The ID of the first user (usually the current authenticated user).
     * @param int $friendId The ID of the second user to check friendship with.
     * @return bool             True if both users are mutual friends, false otherwise.
     */
    public function areMutualFriends(int $userId, int $friendId): bool;
}
