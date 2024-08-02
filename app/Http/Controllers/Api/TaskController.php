<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{

    public function __construct(TaskRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    public function store(StoreTaskRequest $request): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->repository->store($request->validated()));
    }

    public function update(UpdateTaskRequest $request): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->repository->update($request->validated()));
    }

}