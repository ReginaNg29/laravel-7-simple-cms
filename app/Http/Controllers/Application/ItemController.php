<?php

namespace App\Http\Controllers\Application;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $items = DB::table('items')->get();
        return view('admin.forms.item', ['items'=>$items]);
    }

        /**
     * @param \App\Models\Item $items
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getitems(Item $item)
    {
        return view('admin.forms.item', ['object' => $item]);
    }
}