<?php

namespace App\Models;

use App\Base\SluggableModel;
use DateTimeInterface;

class Item extends SluggableModel
{
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
        return route('item', ['pSlug' => $this->slug]);
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

    public function scopeGetitems($items)
    {
        $items = DB::table('items')->get();
        return view('item.getitems', ['items'=>$items]);
    }
}