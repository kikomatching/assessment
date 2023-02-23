<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    use Filterable, HasFactory;

    protected $fillable  = ['address', 'city', 'state', 'zip_code'];

    /**
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function journals(): HasMany
    {
        return $this->hasMany(Journal::class);
    }

    /**
     * Filter results by Owner.
     *
     * @param int $id
     * @return Builder
     */
    public function filterByOwner(Builder $query, int $id): Builder
    {
        return $query->whereHas('user', 
            fn(Builder $query) => $query->where('id', $id)
        );
    }
}
