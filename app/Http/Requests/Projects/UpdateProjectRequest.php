<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'git_hub_url' => 'unique:projects',
        ];
    }

    public function messages(): array
    {
        return [
            'git_hub_url.unique' => 'Repositório já existe.',
        ];
    }
}