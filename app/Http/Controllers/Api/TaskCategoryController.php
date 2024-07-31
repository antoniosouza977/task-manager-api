<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCategory\StoreTaskCategory;
use App\Repositories\TaskCategoryRepository;
use Illuminate\Http\Request;

class TaskCategoryController extends Controller
{

    private TaskCategoryRepository $repository;

    public function __construct(TaskCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskCategory $request): \Illuminate\Http\JsonResponse
    {
        if ($this->repository->getByname($request['name'])) {
            return response()->json([
                'message' => 'Já existe uma categoria com esse nome.'
            ], 400);
        }

        $data = $request->all();
        $data['user_id'] = auth()->id();

        return response()->json($this->repository->store($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
