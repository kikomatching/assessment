<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface BrandRepositoryInterface extends RepositoryInterface
{
    /**
     * Get all Brands by User.
     *
     * @param User $user
     * @return Collection
     */
    public function getAllByOwner(User $user);

    /**
     * Get all Brand Journals.
     *
     * @param User $user
     * @return Collection
     */
    public function getJournalsByOwner(User $user);
}