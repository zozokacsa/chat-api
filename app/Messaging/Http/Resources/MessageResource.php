<?php
declare(strict_types=1);

namespace App\Messaging\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Messaging\Models\Message;

class MessageResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Message $this */

        return [
            'id' => $this->id,
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id,
            'message' => $this->message,
            'created_at' => $this->created_at,
            'is_own' => $request->user()->id === $this->sender_id,
        ];
    }
}
