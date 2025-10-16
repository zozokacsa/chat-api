<?php

namespace Tests\Feature;

use App\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FriendshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_list_friends()
    {
        $user = User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->getJson('/api/friends');

        $response->assertStatus(200)
            ->assertJsonStructure([]);
    }

    public function test_authenticated_user_can_send_friend_request()
    {
        $user = User::factory()->create();
        $friend = User::factory()->create();
        $token = $user->createToken('test')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->postJson('/api/friends/requests', ['friend_id' => $friend->id]);

        $response->assertStatus(201);
    }
}
