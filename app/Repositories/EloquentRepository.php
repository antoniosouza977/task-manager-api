<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class EloquentRepository
{
    protected string $modelClass;
    private Model $model;

    public function __construct()
    {
        $this->model = app($this->modelClass);
    }

    public function store(array $data): Model
    {
        return $this->model->newQuery()->create($data);
    }

    public function getPaginatedUserCollection(int $itemsPerPage): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->where('user_id', auth()->id())
            ->paginate($itemsPerPage);
    }

    public function getUserRecordById(int $recordId)
    {
        return $this->model->newQuery()->find($recordId);
    }

}