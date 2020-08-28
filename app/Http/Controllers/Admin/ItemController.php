<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Base\Services\SitemapService;

class ItemController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return view('admin.forms.item');
    }

    /**
     * @param \App\Models\Item $item
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getItem(Item $item)
    {
        return view('admin.forms.item', ['object' => $item]);
    }

    /**
     * @param \App\Base\Services\SitemapService $sitemapService
     *
     * @return mixed
     * @throws \Exception
     */
    public function getSitemap(SitemapService $sitemapService)
    {
        return $sitemapService->render();
    }
}