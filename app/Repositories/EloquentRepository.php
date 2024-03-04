<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class EloquentRepository
{

    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getCollectionFromAnUser(User $user, string $collection, array $relations = [])
    {
        return $user->$collection()->with($relations)->get();
    }

    public function storeNewModel(array $data)
    {
        return $this->model->create($data);
    }

    public function updateModel(Model $model, array $data): Model
    {
        $model->update($data);

        return $model;
    }

    public function syncModelRelation(Model $model, string $relation, array $ids): void
    {
        $model->$relation()->sync($ids);
        $model->load($relation);
    }

    public function loadModelRelations(Model $model, array $relations): Model
    {
        return $model->load($relations);
    }

    public function destroyModelAndDetachRelations(Model $model, array $relations = []): void
    {
        foreach ($relations as $relation) {
            $model->$relation()->detach();
        }

        $model->delete();
    }

}