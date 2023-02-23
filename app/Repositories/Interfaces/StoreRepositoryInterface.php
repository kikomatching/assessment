<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface StoreRepositoryInterface extends RepositoryInterface
{
    /**
     * List all Stores by User.
     *
     * @param User $user
     * @return Collection
     */
    public function getAllByOwner(User $user): Collection;
}