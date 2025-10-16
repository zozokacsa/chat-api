<?php
declare(strict_types=1);

namespace App\Friendship\Http\Resources;

use App\Friendship\Models\Friendship;
use Illuminate\Http\Resources\Json\JsonResource;

class FriendshipResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Friendship $this */

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'request_sent_at' => $this->request_sent_at
        ];
    }
}
