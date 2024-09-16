<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array{
        return [
            'education' => 'nullable|string|max:255',
            'image_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'paragraphs' => 'required|array|min:2',
            'paragraphs.*' => 'nullable|string|min:3|max:1000',
            'features' => 'required|array|min:4',
            'features.*' => 'nullable|string|min:3|max:255',
        ];
    }
}