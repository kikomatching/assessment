<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StoreRepository extends Repository implements StoreRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAllByOwner(User $user): Collection
    {
        return $this->model->filter([
            'owner' => $user->id,
        ])->get();
    }
}