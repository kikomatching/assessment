<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface 
{
    /**
     * Return all records.
     */
    public function all();

    /**
     * Find record by id;
     */
    public function find($id);
}