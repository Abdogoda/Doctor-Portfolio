<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBackgroundRequest extends FormRequest{
    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:15360',
        ];
    }
}