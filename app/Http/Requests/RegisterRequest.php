<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'bail|required|max:255',
            'password' => 'bail|required|max:255|min:6',
            'email'    => 'bail|required|email|unique:users|max:255|min:6'
        ];
    }

    public function attributes(): array
    {
        return [
            'name'     => 'nome',
            'password' => 'senha',
        ];
    }
}
