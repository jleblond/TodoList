<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

use App\Repositories\RepositoryInterface;


abstract class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $modelToUpdate = $this->model->find($id);
        $modelToUpdate->update($data);
        return $modelToUpdate->fresh();
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function show($id)
    {
        return $this->model->find($id);
    }
}