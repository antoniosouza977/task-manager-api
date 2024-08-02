<?php

namespace App\Models;

use App\Observers\TaskCategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(TaskCategoryObserver::class)]
class TaskCategory extends Model
{
    protected $table = 'task_categories';

    protected $fillable = [
        'name',
        'active',
        'user_id'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function tasks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Task::class, 'task_category_id', 'id');
    }
}