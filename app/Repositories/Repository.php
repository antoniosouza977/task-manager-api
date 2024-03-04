<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected string $model_class;
    private $model;

    public function store(array $data)
    {
        $model = $this->getModel();

        return $model->create($data);
    }

    public function update(Model $model, array $data): Model
    {
        $model->update($data);

        return $model;
    }

    private function getModel()
    {
        if (!$this->model) {
            $this->model = new $this->model_class;
        }

        return $this->model;
    }

}