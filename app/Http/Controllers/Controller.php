<?php

namespace App\Http\Controllers;

use App\Http\Services\ResponseMessage;
use App\Repositories\EloquentRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     *
     * @var EloquentRepository $repository
     */
    protected $repository;

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            $this->repository->getPaginatedUserCollection($request['per_page'] ?? 10),
            ResponseAlias::HTTP_OK
        );
    }

    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $record = $this->repository->getUserRecordBy('id', $id);

        if (!$record) {
            return response()->json([
                'message' => ResponseMessage::REGISTRO_NAO_ENCONTRADO
            ], ResponseAlias::HTTP_NOT_FOUND);
        }

        return response()->json($record, ResponseAlias::HTTP_OK);
    }

    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $record = $this->repository->getUserRecordBy('id', $id);

        if (!$record) {
            return response()->json([
                'message' => ResponseMessage::REGISTRO_NAO_ENCONTRADO
            ], ResponseAlias::HTTP_NOT_FOUND);
        }

        $this->repository->destroy($record);

        return response()->json(['message' => ResponseMessage::REGISTRO_EXCLUIDO], ResponseAlias::HTTP_OK);
    }
}
