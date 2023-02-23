<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    /**
     * @param Model $model
     */
    public function __construct(
        protected Model $model
    ) {
        //
    }

    
    /**
     * Return all records.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find record by id;
     */
    public function find($id)
    {
        return $this->model->find($id);
    }
}