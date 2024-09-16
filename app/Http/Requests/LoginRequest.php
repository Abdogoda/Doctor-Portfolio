<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }

    public function messages(): array{
        return [
            'email.required' => 'البريد الإلكتروني لا بد أن يكون متوفرا',
            'email.string' => 'البريد الإلكتروني لا بد أن يكون حروفا وأرقاما',
            'email.email' => 'البريد الإلكتروني لا بد أن يكون من نوع ايميل',
            'password.required' => 'كلمة المرور لا بد أن يكون من متوفرا',
            'password.string' => 'كلمة المرور لا بد أن يكون من حروفا وأرقاما',
        ];
    }
}