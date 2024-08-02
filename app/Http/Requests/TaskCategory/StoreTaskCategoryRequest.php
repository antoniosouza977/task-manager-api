<?php

namespace App\Http\Requests\TaskCategory;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskCategoryRequest extends FormRequest
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
            'name'   => [
                'bail',
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('task_categories', 'name')->where('user_id', $this->user()->id)
            ],
            'active' => 'boolean',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'   => 'nome',
            'active' => 'ativo',
        ];
    }
}
