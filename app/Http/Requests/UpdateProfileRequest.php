<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        $user = auth()->user();
        return [
            "name" => 'required|string|max:255|unique:users,name,'.$user->id,
            "email" => 'required|email|unique:users,email,'.$user->id,
        ];
    }
}