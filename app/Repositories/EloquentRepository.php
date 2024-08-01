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

    public function update(Model $model, array $data): Model
    {
        $model->update($data);

        return $model;
    }

    public function destroy(Model $model): void
    {
        $model->delete();
    }

    public function getPaginatedUserCollection(int $itemsPerPage): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->where('user_id', auth()->id())
            ->paginate($itemsPerPage);
    }

    public function getUserRecordBy(string $field, string $value): null|Model
    {
        return $this->model
            ->newQuery()
            ->where('user_id', auth()->id())
            ->where($field, $value)
            ->first();
    }

}