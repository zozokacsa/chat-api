<?php
declare(strict_types=1);

namespace App\Messaging\Repositories;

use App\Messaging\Contracts\IMessageRepository;
use App\Messaging\Models\Message;
use App\Messaging\ValueObjects\CreateMessageVO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class MessageRepository implements IMessageRepository
{
    public function create(CreateMessageVO $createMessageVO): Message
    {
        return Message::create([
            'sender_id' => $createMessageVO->senderId,
            'receiver_id' => $createMessageVO->receiverId,
            'message' => $createMessageVO->message
        ]);
    }

    public function getConversation(int $userId, int $friendId): LengthAwarePaginator
    {
        return Message::query()
            ->where(function (Builder $builder) use ($userId, $friendId) {
                $builder->where('sender_id', $userId)
                    ->where('receiver_id', $friendId);
            })
            ->orWhere(function (Builder $builder) use ($userId, $friendId) {
                $builder->where('sender_id', $friendId)
                    ->where('receiver_id', $userId);
            })
            ->orderByDesc('created_at')
            ->paginate(10);
    }
}
