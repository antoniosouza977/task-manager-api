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
            'name' => 'required|max:255',
            'password' => 'required|max:255|min:6',
            'email' => 'required|unique:users|max:255|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome obrigatório.',
            'name.max' => 'Nome excedeu a quantidade de :max caracteres.',
            'password.required' => 'Senha obrigatória.',
            'password.min' => 'A senha precisa possuir pelo menos :min caracteres.',
            'password.max' => 'A senha precisa possuir no máximo :max caracteres.',
            'email.required' => 'Email obrigatório.',
            'email.unique' => 'Email já utilizado.',
            'email.max  ' => 'Email excedeu o tamanho máximo.',
            'email.min' => 'Email precisa ter pelo menos :min caracteres.',
        ];
    }
}
