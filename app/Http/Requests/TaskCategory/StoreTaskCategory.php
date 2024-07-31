<?php

namespace App\Http\Requests\TaskCategory;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskCategory extends FormRequest
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
            'name' => 'required|min:3|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome obrigatório',
            'name.min' => 'Nome deve ter pelo menos 3 caracteres',
            'name.max' => 'Nome deve ter no máximo 50 caracteres',
        ];
    }
}
