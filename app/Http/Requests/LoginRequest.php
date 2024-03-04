<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|max:255',
            'password' => 'required|max:255|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email obrigatório.',
            'email.max' => 'Email excedeu o máximo de caracteres permitidos.',
            'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            'password.required' => 'Senha obrigatória.',
        ];
    }
}
