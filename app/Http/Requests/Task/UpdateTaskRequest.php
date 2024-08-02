<?php

namespace App\Http\Requests\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
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
            'id'               => [
                'bail',
                'required',
                'integer',
                Rule::exists('tasks', 'id')->where('user_id', auth()->id())
            ],
            'description'      => 'string|max:255',
            'completed'        => 'boolean',
            'date'             => 'date',
            'task_category_id' => [
                'bail',
                'integer',
                Rule::exists('task_categories', 'id')->where('user_id', auth()->id())
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'description'      => 'descrição',
            'completed'        => 'completo',
            'date'             => 'data',
            'task_category_id' => 'categoria'
        ];
    }

}
