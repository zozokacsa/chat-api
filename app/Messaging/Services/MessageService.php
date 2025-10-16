<?php
declare(strict_types=1);

namespace App\Messaging\Services;

use App\Messaging\Contracts\IMessageRepository;
use App\Friendship\Contracts\IFriendshipRepository;
use App\Friendship\Exceptions\NotFriendsException;
use App\Messaging\Contracts\IMessageService;
use App\Messaging\Models\Message;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Messaging\ValueObjects\CreateMessageVO;

readonly class MessageService implements IMessageService
{
    public function __construct(
        private IMessageRepository    $messageRepository,
        private IFriendshipRepository $friendshipRepository
    )
    {
    }

    public function sendMessage(CreateMessageVO $createMessageVO): Message
    {
        if (!$this->friendshipRepository->areMutualFriends($createMessageVO->senderId, $createMessageVO->receiverId)) {
            throw new NotFriendsException();
        }

        return $this->messageRepository->create($createMessageVO);
    }

    public function getConversation(int $userId, int $friendId): LengthAwarePaginator
    {
        if (!$this->friendshipRepository->areMutualFriends($userId, $friendId)) {
            throw new NotFriendsException();
        }

        return $this->messageRepository->getConversation($userId, $friendId);
    }
}
