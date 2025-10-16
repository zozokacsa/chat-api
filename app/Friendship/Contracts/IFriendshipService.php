<?php
declare(strict_types=1);

namespace App\Friendship\Contracts;

use App\Auth\Models\User;
use Illuminate\Support\Collection;
use InvalidArgumentException;

interface IFriendshipService
{
    /**
     * Get all accepted friends for a user
     *
     * @param int $userId
     * @return Collection<User>
     */
    public function getActiveFriendsByUserId(int $userId): Collection;

    /**
     * Get all pending friend requests received by a user
     *
     * @param int $userId
     * @return Collection<User>
     */
    public function getReceivedFriendRequests(int $userId): Collection;

    /**
     * Get all pending friend requests sent by a user
     *
     * @param int $userId
     * @return Collection<User>
     */
    public function getSentFriendRequests(int $userId): Collection;

    /**
     * Send a friend request from one user to another
     *
     * @param int $senderId
     * @param int $receiverId
     * @return void
     * @throws InvalidArgumentException
     */
    public function sendFriendRequest(int $senderId, int $receiverId): void;

    /**
     * Accept a friend request
     *
     * @param int $userId User accepting the request
     * @param int $requesterId User who sent the request
     * @return void
     * @throws InvalidArgumentException
     */
    public function acceptFriendRequest(int $userId, int $requesterId): void;

    /**
     * Reject a friend request
     *
     * @param int $userId User rejecting the request
     * @param int $requesterId User who sent the request
     * @return void
     * @throws InvalidArgumentException
     */
    public function rejectFriendRequest(int $userId, int $requesterId): void;

    /**
     * Remove a friendship (unfriend)
     *
     * @param int $userId
     * @param int $friendId
     * @return void
     */
    public function removeFriendship(int $userId, int $friendId): void;

    /**
     * Check if two users are friends
     *
     * @param int $userId
     * @param int $friendId
     * @return bool
     */
    public function areFriends(int $userId, int $friendId): bool;

    /**
     * Check if user has a pending request to another user
     *
     * @param int $senderId
     * @param int $receiverId
     * @return bool
     */
    public function hasPendingRequest(int $senderId, int $receiverId): bool;

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
