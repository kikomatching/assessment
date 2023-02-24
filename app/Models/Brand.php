<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Brand extends Model
{
    use Filterable, HasFactory;
    
    protected $fillable = ['name', 'color'];

    /**
     * @return HasMany
     */
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    /**
     * @return HasManyThrough
     */
    public function journals(): HasManyThrough
    {
        return $this->hasManyThrough(Journal::class, Store::class);
    }

    /**
     * Filter results by Owner.
     *
     * @param int $id
     * @return Builder
     */
    public function filterByOwner(Builder $query, int $id): Builder
    {
        return $query->whereHas('stores', 
            fn(Builder $query) => $query->where('user_id', $id)
        );
    }
}
