<?php
declare(strict_types=1);

namespace App\Messaging\Contracts;

use App\Messaging\Models\Message;
use App\Messaging\ValueObjects\CreateMessageVO;
use Illuminate\Pagination\LengthAwarePaginator;

interface IMessageService
{
    /**
     * Send a message from one user to another.
     *
     * @param CreateMessageVO $createMessageVO Value object containing
     *                                         sender_id, receiver_id, and message content.
     *
     * @return Message The newly created Message model instance.
     */
    public function sendMessage(CreateMessageVO $createMessageVO): Message;

    /**
     * Retrieve the conversation between two users, paginated.
     *
     * @param int $userId The ID of the current user.
     * @param int $friendId The ID of the other user in the conversation.
     *
     * @return LengthAwarePaginator Paginated collection of Message models,
     *                               ordered by creation date descending.
     */
    public function getConversation(int $userId, int $friendId): LengthAwarePaginator;
}
