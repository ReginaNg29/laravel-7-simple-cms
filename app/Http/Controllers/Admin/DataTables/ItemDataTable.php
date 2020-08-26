<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Base\Controllers\DataTableController;
use App\Models\Item;

class ItemDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Items::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['id', 'amount', 'name', 'description', 'createdData', 'updatedData'];

    /**
     * @var bool
     */
    protected $ops = true;

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $Items = Items::query();
        return $this->applyScopes($Items);
    }
}