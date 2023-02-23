<?php

namespace App\Repositories\Interfaces;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;

interface JournalRepositoryInterface extends RepositoryInterface
{
    /**
     * Get all Journals by Brand.
     *
     * @param Brand $brand
     * @return Collection
     */
    public function getAllByBrand(Brand $brand): Collection;
}