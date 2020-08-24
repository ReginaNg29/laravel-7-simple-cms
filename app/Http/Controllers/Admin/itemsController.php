<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\ItemsDataTable;
use App\Models\Items;
use Illuminate\Http\Request;

class itemsController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'id'     => 'required|integer',
        'amount'   => 'nullable|integer',
        'name' => 'nullable|string|max:255',
        'description'       => 'nullable|string|max:255',
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\ItemsDataTable $dataTable
     *
     * @return mixed
     */
    public function index(ItemsDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.items.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.items', $this->formVariables('items', null, $this->options()));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Items::class, $request);
    }

    /**
     * @param \App\Models\Items $items
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Items $items)
    {
        return view('admin.show', ['object' => $items]);
    }

    /**
     * @param \App\Models\Items $items
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Items $items)
    {
        return view('admin.forms.items', $this->formVariables('Items', $items, $this->options($items->id)));
    }

    /**
     * @param \App\Models\Items $items
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Items $items, Request $request)
    {
        return $this->saveFlashRedirect($items, $request);
    }

    /**
     * @param \App\Models\Items $items
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Items $items)
    {
        return $this->destroyFlashRedirect($items);
    }

    /**
     * @param null $id
     *
     * @return array
     */
    protected function options($id = null): array
    {
        return ['options' => Items::when($id !== null, function ($q) use ($id) {
            return $q->where('id', '!=', $id);
        })->pluck('id', 'amount', 'name', 'description')];
    }
}
