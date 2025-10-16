<?php
declare(strict_types=1);

namespace App\Messaging\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'receiver_id' => ['required', 'integer', 'exists:users,id'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }
}
