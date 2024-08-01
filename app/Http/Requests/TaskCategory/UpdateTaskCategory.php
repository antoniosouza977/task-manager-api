<?php

namespace App\Http\Requests\TaskCategory;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskCategory extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|min:3|max:50',
            'active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'O campo nome deve ser do tipo texto',
            'name.min' => 'Nome deve ter pelo menos 3 caracteres',
            'name.max' => 'Nome deve ter no máximo 50 caracteres',
            'active.boolean' => 'O campo ativo deve ser boleano',
        ];
    }
}
