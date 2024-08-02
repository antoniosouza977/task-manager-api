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
            'email'    => 'bail|required|max:255',
            'password' => 'bail|required|max:255|min:6',
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => 'senha',
        ];
    }
}
