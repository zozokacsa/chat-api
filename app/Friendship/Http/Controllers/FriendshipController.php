<?php
declare(strict_types=1);

namespace App\Friendship\Http\Controllers;

use App\Friendship\Contracts\IFriendshipService;
use App\Friendship\Http\Requests\StoreFriendRequestRequest;
use App\Friendship\Http\Resources\FriendshipResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class FriendshipController extends Controller
{
    public function __construct(
        private readonly IFriendshipService $friendshipService
    )
    {
    }

    public function index(): JsonResponse
    {
        $friends = $this->friendshipService->getActiveFriendsByUserId(auth()->id());
        return response()->json(
            FriendshipResource::collection($friends)
        );
    }

    public function receivedRequests(): JsonResponse
    {
        $requests = $this->friendshipService->getReceivedFriendRequests(auth()->id());
        return response()->json(
            FriendshipResource::collection($requests)
        );
    }

    public function sentRequests(): JsonResponse
    {
        $requests = $this->friendshipService->getSentFriendRequests(auth()->id());
        return response()->json(
            FriendshipResource::collection($requests)
        );
    }

    public function store(StoreFriendRequestRequest $request): JsonResponse
    {
        $this->friendshipService->sendFriendRequest(
            auth()->id(),
            $request->validated('friend_id')
        );

        return response()->json([
            'success' => true
        ], 201);
    }

    public function accept(int $requesterId): JsonResponse
    {
        $this->friendshipService->acceptFriendRequest(auth()->id(), $requesterId);

        return response()->json([
            'success' => true
        ]);
    }

    public function reject(int $requesterId): JsonResponse
    {
        $this->friendshipService->rejectFriendRequest(auth()->id(), $requesterId);

        return response()->json([
            'success' => true
        ]);
    }

    public function destroy(int $friendId): JsonResponse
    {
        $this->friendshipService->removeFriendship(auth()->id(), $friendId);

        return response()->json([
            'success' => true
        ]);
    }
}
