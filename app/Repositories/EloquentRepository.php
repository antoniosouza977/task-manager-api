<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class EloquentRepository
{
    protected string $modelClass;

    public function store(array $data): Model
    {
        /**
         * @var Model $model
         */

        $model = new $this->modelClass;
        return $model->newQuery()->create($data);
    }

}