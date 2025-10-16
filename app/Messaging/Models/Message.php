<?php
declare(strict_types=1);

namespace App\Messaging\Models;


use App\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeImmutable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string $message
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 */
class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = ['sender_id', 'receiver_id', 'message'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
