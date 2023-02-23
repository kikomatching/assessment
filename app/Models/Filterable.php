<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Undocumented function
     *
     * @param array $filters
     * @return Builder
     */
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        foreach ($filters as $filter => $value) {
            $method = 'filterBy' . ucfirst($filter);

            if (method_exists($this, $method)) {
                $query = $this->{$method}($query, $value);
            }
        }

        return $query;
    }

    /**
     * Filter records by the model's attribute.
     *
     * @param Builder $query
     * @param mixed $attribute
     * @param mixed $value
     * @return Builder
     */
    public function filterByAttribute(Builder $query, $attribute, $value): Builder
    {
        return $query->where($attribute, $value);
    }

    /**
     * Filter records by Date Range.
     *
     * @param string $attribute
     * @param mixed $from
     * @param mixed $to
     * @return Builder
     */
    public function filterByDateRange(Builder $query, $attribute, $from, $to): Builder
    {
        $query->where($attribute, '>=', $from)
                    ->where($attribute, '>=', $to);
                    
        return $query;
    }
}