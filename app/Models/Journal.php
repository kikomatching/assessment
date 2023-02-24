<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Journal extends Model
{
    use Filterable, HasFactory;

    protected $fillable = ['date', 'revenue', 'food_cost', 'labor_cost', 'profit'];

    /**
     * @return BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Filter records by Store Brand.
     *
     * @param Builder $query
     * @param integer $id
     * @return Builder
     */
    public function filterByBrand(Builder $query, int $id): Builder
    {
        return $query->whereHas('store.brand', 
            fn($query) => $query->where('id', $id)
        );
    }
    
    /**
     * Filter record by Store Owner.
     *
     * @param Builder $query
     * @param integer $id
     * @return Builder
     */
    public function filterByOwner(Builder $query, int $id): Builder
    {
        return $query->whereHas('store.user',
            fn($query) => $query->where('id', $id)
        );
    }

    /**
     * Get the store complete address.
     *
     * @param  string  $value
     * @return string
     */
    public function getDateAttribute($value)
    {
        return $value;
    }

    /**
     * Get the store complete address.
     *
     * @param  string  $value
     * @return string
     */
    public function getRevenueAttribute($value)
    {
        return '$' . number_format($value, 2);
    }

    /**
     * Get the store complete address.
     *
     * @param  string  $value
     * @return string
     */
    public function getFoodCostAttribute($value)
    {
        return '$' . number_format($value, 2);
    }

    /**
     * Get the store complete address.
     *
     * @param  string  $value
     * @return string
     */
    public function getLaborCostAttribute($value)
    {
        return '$' . number_format($value, 2);
    }

    /**
     * Get the store complete address.
     *
     * @param  string  $value
     * @return string
     */
    public function getProfitAttribute($value)
    {
        return '$' . number_format($value, 2);
    }
}
