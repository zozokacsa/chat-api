<?php
declare(strict_types=1);

namespace App\Messaging\Http\Controllers;

use App\Messaging\Contracts\IMessageService;
use App\Messaging\Http\Requests\SendMessageRequest;
use App\Messaging\Http\Resources\MessageResource;
use App\Messaging\ValueObjects\CreateMessageVO;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class MessageController extends Controller
{
    public function __construct(
        private readonly IMessageService $messageService
    )
    {
    }

    public function store(SendMessageRequest $request): JsonResponse
    {
        $message = $this->messageService->sendMessage(
            new CreateMessageVO(
                senderId: auth()->user()->id,
                receiverId: (int)$request->validated('receiver_id'),
                message: $request->validated('message')
            )
        );

        return response()->json(
            new MessageResource($message)
        );
    }

    public function show(int $friendId): JsonResponse
    {
        $messages = $this->messageService->getConversation(auth()->user()->id, $friendId);

        return response()->json(
            MessageResource::collection($messages)
        );
    }
}
