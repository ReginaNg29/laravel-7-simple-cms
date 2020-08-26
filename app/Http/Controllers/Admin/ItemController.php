<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\ItemDataTable;
use App\Models\Item;
use Illuminate\Http\Request;

class itemController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'id'     => 'required|integer',
        'amount'   => 'nullable|integer',
        'name' => 'nullable|string|max:255',
        'description'       => 'nullable|string|max:255',
        'createdData' => 'nullable|timestamp|max:255',
        'createdData' => 'nullable|timestamp|max:255'
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\ItemDataTable $dataTable
     *
     * @return mixed
     */
    public function index(ItemDataTable $dataTable)
    {
        return $dataTable->render('admin.forms.item', ['link' => route('admin.item.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.item', $this->formVariables('item', null, $this->options()));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Item::class, $request);
    }

    /**
     * @param \App\Models\Item $item
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Item $item)
    {
        return view('admin.show', ['object' => $item]);
    }

    /**
     * @param \App\Models\Item $item
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Item $item)
    {
        return view('admin.forms.item', $this->formVariables('item', $item, $this->options($item->id)));
    }

    /**
     * @param \App\Models\Item $item
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Item $item, Request $request)
    {
        return $this->saveFlashRedirect($item, $request);
    }

    /**
     * @param \App\Models\Item $item
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Item $item)
    {
        return $this->destroyFlashRedirect($item);
    }

        /**
     * @return array
     */
    protected function options()
    {
        return ['options' => Item::pluck('id', 'amount', 'name', 'description', 'createdData', 'updatedData')];
    }

}