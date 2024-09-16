<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'current_password' => 'required|string',
            'password' => 'required|min:6|max:255|string|confirmed'
        ];
    }
}