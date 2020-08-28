<?php

namespace App\Models;

use App\Base\SluggableModel;
use DateTimeInterface;
use Illuminate\Support\Facades\DB;

class Item extends SluggableModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['amount', 'name', 'description'];

    /**
     * Customize the names of the columns used to store the timestamps.
     */
    const CREATED_AT = 'createdData';
    const UPDATED_AT = 'updatedData';

    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('item', ['iId' => $this->itemId]);
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopeSearch($query, $n)
    {
        if ($n == null) return $query;
        return $query
            ->where('id', 'LIKE', "%{$n}%")
            ->orWhere('amount', 'LIKE', "%{$n}%")
            ->orWhere('name', 'LIKE', "%{$n}%")
            ->orWhere('description', 'LIKE', "%{$n}%");
    }
}