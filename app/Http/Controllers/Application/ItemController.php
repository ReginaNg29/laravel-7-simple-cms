<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Regina;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DataTables\ItemDataTable;
use Illuminate\Support\Facades\Input;
use Auth;

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
        $item= Item::all()->sortByDesc('createdData');
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
        $item= Item::all()->sortByDesc('createdData'); 
        return back()->withInput();
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

    public function itemFilterId() {
        $item= Item::simplePaginate(15);
        return view('partials.admin.form.itemsearchId', ['items' => $item]);
    }

    public function itemFilterName() {
        $item= Item::all();
        return view('partials.admin.form.itemsearchName', ['items' => $item]);
    }

    public function itemFilterAmount() {
        $item= Item::all();
        return view('partials.admin.form.itemsearchAmount', ['items' => $item]);
    }

    public function itemFilterCreated() {
        $item= Item::all();
        return view('partials.admin.form.itemsearchCreated', ['items' => $item]);
    }

    public function itemFilterUpdated() {
        $item= Item::all();
        return view('partials.admin.form.itemsearchUpdated', ['items' => $item]);
    }

    public function search(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $amountFrom = $request->from;
        $amountTo = $request->to;
        $createdDataFrom = $request->createdDataFrom;
        $createdDataTo = $request->createdDataTo;
        $updatedDataFrom = $request->updatedDataFrom;
        $updatedDataTo = $request->updatedDataTo;

        if (isset($_POST["submitButton"])) {
            switch ($_POST["submitButton"]) {
                case "filterId":
                    $item = Item::where('id', 'LIKE', '%' . request()->id . '%')->get();
                    return view('partials.admin.form.itemsearchId', ['items' => $item]);
                break;
                case "filterName":
                    $item = Item::where('name', 'LIKE', '%' . request()->name . '%')->get();
                    return view('partials.admin.form.itemsearchName', ['items' => $item]);
                break;
                case "filterAmount":
                    $item = Item::whereBetween('amount', [$amountFrom, $amountTo])->get();
                    return view('partials.admin.form.itemsearchAmount', ['items' => $item]);
                break;
                case "filterCreated":
                    $item = Item::whereBetween('createdData', [$createdDataFrom, $createdDataTo])->get();
                    return view('partials.admin.form.itemsearchCreated', ['items' => $item]);
                break;
                case "filterUpdated":
                    $item = Item::whereBetween('updatedData', [$updatedDataFrom, $updatedDataTo])->get();
                    return view('partials.admin.form.itemsearchUpdated', ['items' => $item]);
                break;
                case "back":
                    $item= Item::all();
                    return view('admin.forms.item', ['items' => $item]); 
                break;
            }
            }
    }
}
