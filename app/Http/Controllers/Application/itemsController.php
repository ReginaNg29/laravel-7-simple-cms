<?php

namespace App\Http\Controllers\Application;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class itemsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('Items');
    }

    /**
     * @param \App\Models\Items $items
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getItems(Items $items)
    {
        return view('Items', ['object' => $items]);
    }
}
