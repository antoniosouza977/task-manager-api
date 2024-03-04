<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'git_hub_url' => 'required|unique:projects',
            'authors' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'git_hub_url.required' => 'URL do repositório no GIT HUB obrigatória.',
            'git_hub_url.unique' => 'Repositório já adicionado.',
            'authors.required' => 'Lista de autores obrigatória.',
        ];
    }
}