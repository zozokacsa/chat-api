<?php
declare(strict_types=1);

namespace App\Auth\Http\Controllers;

use App\Auth\Contracts\IAuthService;
use App\Auth\Exceptions\InvalidCredentialsException;
use App\Auth\Exceptions\UserNotVerifiedException;
use App\Auth\Http\Requests\ApiEmailVerificationRequest;
use App\Auth\Http\Requests\LoginRequest;
use App\Auth\Http\Requests\RegisterRequest;
use App\Auth\Models\User;
use App\Auth\ValueObjects\CreateUserVO;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Exception;
use Illuminate\Support\Arr;

class AuthController extends Controller
{
    public function __construct(
        public readonly IAuthService $authService,
    )
    {
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $createUserVO = new CreateUserVO(
                name: Arr::get($validatedData, 'name'),
                email: Arr::get($validatedData, 'email'),
                password: Arr::get($validatedData, 'password'),
            );
            $this->authService->register($createUserVO);

            return response()->json([
                'success' => true
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            /** @var User $user */
            $user = $this->authService->loginWithEmailAndPassword(
                email: $request->get('email'),
                password: $request->get('password'),
            );

            $this->authService->checkUserIsVerified($user);
            $token = $this->authService->createToken($user);

            return response()->json([
                'token' => $token,
                'user' => $user
            ]);
        } catch (InvalidCredentialsException|UserNotVerifiedException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $request->user()
        ]);
    }

    public function verifyEmail(ApiEmailVerificationRequest $request, int $id): JsonResponse
    {
        try {
            $this->authService->verifyUserById($id);

            return response()->json([
                'success' => true
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
