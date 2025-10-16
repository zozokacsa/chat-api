<?php
declare(strict_types=1);

namespace App\Auth\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Auth\Models\User;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var User $this */

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
