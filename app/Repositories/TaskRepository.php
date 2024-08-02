<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends EloquentRepository
{

    protected string $modelClass = Task::class;

}