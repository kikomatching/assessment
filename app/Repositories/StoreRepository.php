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
        return $this->model->with('brand')
                            ->withSum('journals', 'revenue')
                            ->withSum('journals', 'profit')
                            ->filter([
                                'owner' => $user->id,
                            ])->get();
    }
}