<?php
declare(strict_types=1);

namespace App\Friendship\Services;

use App\Auth\Models\User;
use App\Friendship\Contracts\IFriendshipRepository;
use App\Friendship\Contracts\IFriendshipService;
use App\Friendship\Enums\FriendshipStatusEnum;
use App\Friendship\Exceptions\AlreadyFriendsException;
use App\Friendship\Exceptions\CannotAddYourselfException;
use App\Friendship\Exceptions\FriendRequestAlreadySentException;
use App\Friendship\Exceptions\FriendRequestNotFoundException;
use App\Friendship\Exceptions\NotFriendsException;
use App\Friendship\Exceptions\PendingRequestExistsException;
use App\Friendship\Exceptions\UserNotActiveException;
use Illuminate\Support\Collection;

readonly class FriendshipService implements IFriendshipService
{
    public function __construct(
        private IFriendshipRepository $friendshipRepository
    )
    {
    }

    public function getActiveFriendsByUserId(int $userId): Collection
    {
        return $this->friendshipRepository->getFriendsByUserIdAndStatus(
            $userId,
            FriendshipStatusEnum::Accepted
        );
    }

    public function getReceivedFriendRequests(int $userId): Collection
    {
        return $this->friendshipRepository->getReceivedFriendRequests($userId);
    }

    public function getSentFriendRequests(int $userId): Collection
    {
        return $this->friendshipRepository->getSentFriendRequests($userId);
    }

    public function sendFriendRequest(int $senderId, int $receiverId): void
    {
        // Cannot send request to yourself
        if ($senderId === $receiverId) {
            throw new CannotAddYourselfException();
        }

        // Check if users are already friends
        if ($this->areFriends($senderId, $receiverId)) {
            throw new AlreadyFriendsException();
        }

        // Check if there's already a pending request from sender
        if ($this->hasPendingRequest($senderId, $receiverId)) {
            throw new FriendRequestAlreadySentException();
        }

        // Check if there's a pending request from the other user
        if ($this->hasPendingRequest($receiverId, $senderId)) {
            throw new PendingRequestExistsException();
        }

        // Verify receiver is active (email verified)
        $receiver = User::findOrFail($receiverId);
        if ($receiver->email_verified_at === null) {
            throw new UserNotActiveException();
        }

        $this->friendshipRepository->createRequest($senderId, $receiverId);
    }

    public function acceptFriendRequest(int $userId, int $requesterId): void
    {
        // Verify the request exists
        if (!$this->hasPendingRequest($requesterId, $userId)) {
            throw new FriendRequestNotFoundException();
        }

        $this->friendshipRepository->acceptRequest($requesterId, $userId);
    }

    public function rejectFriendRequest(int $userId, int $requesterId): void
    {
        // Verify the request exists
        if (!$this->hasPendingRequest($requesterId, $userId)) {
            throw new FriendRequestNotFoundException();
        }

        $this->friendshipRepository->rejectRequest($requesterId, $userId);
    }

    public function removeFriendship(int $userId, int $friendId): void
    {
        if (!$this->areFriends($userId, $friendId)) {
            throw new NotFriendsException();
        }

        $this->friendshipRepository->deleteFriendship($userId, $friendId);
    }

    public function areFriends(int $userId, int $friendId): bool
    {
        return $this->friendshipRepository->exists(
            $userId,
            $friendId,
            FriendshipStatusEnum::Accepted
        );
    }

    public function hasPendingRequest(int $senderId, int $receiverId): bool
    {
        return $this->friendshipRepository->exists(
            $senderId,
            $receiverId,
            FriendshipStatusEnum::Pending
        );
    }

    public function areMutualFriends(int $userId, int $friendId): bool
    {
        return $this->friendshipRepository->areMutualFriends($userId, $friendId);
    }
}
