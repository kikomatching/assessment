<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\Interfaces\JournalRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class JournalRepository extends Repository implements JournalRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAllByBrand(Brand $brand): Collection
    {
        return $this->model->filter([
            'brand' => $brand->id
        ])->get();
    }
}