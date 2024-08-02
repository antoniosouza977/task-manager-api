<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCategory\StoreTaskCategoryRequest;
use App\Http\Requests\TaskCategory\UpdateTaskCategoryRequest;
use App\Repositories\TaskCategoryRepository;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TaskCategoryController extends Controller
{
    public function __construct(TaskCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(StoreTaskCategoryRequest $request): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->repository->store($request->validated()), ResponseAlias::HTTP_CREATED);
    }

    public function update(UpdateTaskCategoryRequest $request): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->repository->update($request->validated()), ResponseAlias::HTTP_OK);
    }

}
