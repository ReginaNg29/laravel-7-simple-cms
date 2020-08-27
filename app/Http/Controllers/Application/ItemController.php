<?php

namespace App\Http\Controllers\Application;

use App\Models\Item;
use App\Http\Controllers\Admin\DataTables\ItemDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
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
    public function create(Request $request)
    {
        $item= Item::all(); 
        return view('admin.forms.item', ['items' => $item]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     * Store Item Form Data
     */
    public function store(Request $request)
    {
        /** Form validation */
        $this->validate($request, [
            'amount'=>'required',
            'name'=>'required',
            'description'=>'required'
        ]);

        /** Store data in database */
        Item::create($request->all());

        $item = new Item([
            'id'=>$request->get('id'),
            'amount'=>$request->get('amount'),
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'createdData'=>$request->get('createdData'),
            'updatedData'=>$request->get('updatedData')
        ]);
        
        return view('admin.forms.item', ['items' => $item]);
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
        $request->validate([
            'amount'=>'required',
            'name'=>'required',
            'description'=>'required'
        ]);

        $item->id=$request->get('id');
        $item->amount=$request->get('amount');
        $item->name=$request->get('name');
        $item->description=$request->get('description');
        $item->createdData=$request->get('createdData');
        $item->updatedData=$request->get('updatedData');
        $item->save();
        
        return redirect('/item')->with('success', 'Item saved!');
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

    public function getSearchItem()
    {
        $iName = Input::get ('iName');
        $item = Item::where('name', 'LIKE', '%'.$iName. '%')->get();
            if (count($item)>0)
                return view('welcome')->withDetails($item)->withQuery ($iName);
                else return view ('welcome')->withMessage('No details found. Try to search again!');
    }
}