<?php
declare(strict_types=1);

namespace App\Auth\Http\Requests;

use App\Auth\Contracts\IUserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Http\FormRequest;

class ApiEmailVerificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        /** @var IUserService $userService */
        $userService = resolve(IUserService::class);
        try {
            $user = $userService->findByIdOrFail((int)$this->route('id'));
        } catch (ModelNotFoundException $e){
            return false;
        }

        return hash_equals(
            sha1($user->getEmailForVerification()),
            (string)$this->route('hash')
        );
    }
}
