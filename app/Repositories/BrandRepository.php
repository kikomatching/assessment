<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\BrandRepositoryInterface;

class BrandRepository extends Repository implements BrandRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAllByOwner(User $user)
    {
        return $this->model->filter([
            'owner' => $user->id,
        ])->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getJournalsByOwner(User $user)
    {
        return $this->model->with('journals')
                            ->get();
    }
}