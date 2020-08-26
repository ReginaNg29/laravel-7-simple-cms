<?php

namespace App\Http\Controllers\Application;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
        /**
     * @param \App\Models\Item $items
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getitems()
    {
        $result= Item::all(); 
        return view('admin.forms.item', ['items' => $result]);
    }
}