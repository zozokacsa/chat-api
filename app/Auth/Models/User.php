<?php
declare(strict_types=1);

namespace App\Auth\Models;

use App\Friendship\Models\Friendship;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DateTimeImmutable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 */
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

        /**
     * Friendships where this user is the initiator
     */
    public function friendshipsAsUser(): HasMany
    {
        return $this->hasMany(Friendship::class, 'user_id');
    }

    /**
     * Friendships where this user is the friend
     */
    public function friendshipsAsFriend(): HasMany
    {
        return $this->hasMany(Friendship::class, 'friend_id');
    }
}
