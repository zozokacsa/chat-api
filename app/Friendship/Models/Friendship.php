<?php
declare(strict_types=1);

namespace App\Friendship\Models;

use App\Auth\Models\User;
use App\Friendship\Enums\FriendshipStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use DateTimeImmutable;

/**
 * @property int $id
 * @property int $user_id
 * @property int $friend_id
 * @property FriendshipStatusEnum $status
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 */
class Friendship extends Model
{
    use HasFactory;

    protected $table = 'friendships';

    protected $fillable = [
        'user_id',
        'friend_id',
        'status',
    ];

    protected $attributes = [
        'status' => FriendshipStatusEnum::Pending,
    ];

    protected function casts(): array
    {
        return [
            'status' => FriendshipStatusEnum::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function friend(): BelongsTo
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
