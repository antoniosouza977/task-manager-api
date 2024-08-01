<?php

namespace App\Repositories;

use App\Models\TaskCategory;

class TaskCategoryRepository extends EloquentRepository
{
    protected string $modelClass = TaskCategory::class;
}