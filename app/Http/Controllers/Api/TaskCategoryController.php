<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCategory\StoreTaskCategory;
use App\Http\Requests\TaskCategory\UpdateTaskCategory;
use App\Http\Services\ResponseMessage;
use App\Repositories\TaskCategoryRepository;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TaskCategoryController extends Controller
{
    public function __construct(TaskCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(StoreTaskCategory $request): \Illuminate\Http\JsonResponse
    {
        if ($this->repository->getUserRecordBy('name', $request['name'])) {
            return response()->json([
                'message' => 'Já existe uma categoria com esse nome.'
            ], ResponseAlias::HTTP_BAD_REQUEST);
        }

        $data = $request->all();
        $data['user_id'] = auth()->id();

        return response()->json($this->repository->store($data), ResponseAlias::HTTP_CREATED);
    }

    public function update(int $id, UpdateTaskCategory $request): \Illuminate\Http\JsonResponse
    {
        $record = $this->repository->getUserRecordBy('id', $id);

        if (!$record) {
            return response()->json([
                'message' => ResponseMessage::REGISTRO_NAO_ENCONTRADO
            ], ResponseAlias::HTTP_NOT_FOUND);
        }

        return response()->json($this->repository->update($record, $request->validated()), ResponseAlias::HTTP_OK);
    }

}
