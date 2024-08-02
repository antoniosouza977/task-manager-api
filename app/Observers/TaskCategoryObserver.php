<?php

namespace App\Observers;

use App\Models\TaskCategory;

class TaskCategoryObserver
{
    /**
     * Handle the TaskCategory "created" event.
     */
    public function created(TaskCategory $taskCategory): void
    {
        //
    }

    public function creating(TaskCategory $taskCategory): void
    {
        $taskCategory->user_id = auth()->id();
    }

    /**
     * Handle the TaskCategory "updated" event.
     */
    public function updated(TaskCategory $taskCategory): void
    {
        //
    }

    /**
     * Handle the TaskCategory "deleted" event.
     */
    public function deleted(TaskCategory $taskCategory): void
    {
        //
    }

    /**
     * Handle the TaskCategory "restored" event.
     */
    public function restored(TaskCategory $taskCategory): void
    {
        //
    }

    /**
     * Handle the TaskCategory "force deleted" event.
     */
    public function forceDeleted(TaskCategory $taskCategory): void
    {
        //
    }
}
