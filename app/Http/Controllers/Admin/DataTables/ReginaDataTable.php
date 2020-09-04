<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Base\Controllers\DataTableController;
use App\Models\Regina;

class ReginaDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Regina::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['email', 'password'];

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
        $regina = Regina::query();
        return $this->applyScopes($regina);
    }
}
