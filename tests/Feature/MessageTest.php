<?php

namespace Tests\Feature;

use App\Auth\Models\User;
use App\Friendship\Contracts\IFriendshipService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    protected IFriendshipService $friendshipService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->friendshipService = app(IFriendshipService::class);
    }

    public function test_authenticated_user_can_send_message()
    {
        $user = User::factory()->create();
        $friend = User::factory()->create();
        $this->friendshipService->sendFriendRequest($user->id, $friend->id);
        $this->friendshipService->acceptFriendRequest($friend->id, $user->id);
        $token = $user->createToken('test')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->postJson('/messages', [
                'receiver_id' => $friend->id,
                'message' => 'Hello!',
            ]);

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_get_conversation()
    {
        $user = User::factory()->create();
        $friend = User::factory()->create();
        $this->friendshipService->sendFriendRequest($user->id, $friend->id);
        $this->friendshipService->acceptFriendRequest($friend->id, $user->id);
        $token = $user->createToken('test')->plainTextToken;

        $this->withHeader('Authorization', "Bearer $token")
            ->postJson('/messages', ['receiver_id' => $friend->id, 'message' => 'Hi']);

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->getJson("/api/messages/{$friend->id}");

        $response->assertStatus(200)
            ->assertJsonStructure([['id', 'sender_id', 'receiver_id', 'message', 'created_at']]);
    }
}
