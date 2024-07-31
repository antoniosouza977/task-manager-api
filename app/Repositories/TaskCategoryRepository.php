<?php

namespace App\Repositories;

use App\Models\TaskCategory;

class TaskCategoryRepository extends EloquentRepository
{
    protected string $modelClass = TaskCategory::class;

    public function getByname(string $name): object|null
    {
        return TaskCategory::query()
            ->where('name', $name)
            ->where('user_id', auth()->id())
            ->first();
    }

}