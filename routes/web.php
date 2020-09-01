<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'root', 'uses' => 'PageController@getIndex']);
Route::get('a/{aSlug}', ['as' => 'article', 'uses' => 'PageController@getArticle']);
Route::get('p/{pSlug}', ['as' => 'page', 'uses' => 'PageController@getPage']);
Route::get('c/{cSlug}', ['as' => 'category', 'uses' => 'PageController@getCategory']);
Route::get('sitemap.xml', ['as' => 'sitemap', 'uses' => 'PageController@getSitemap']);
Route::get('item', ['uses' => 'ItemController@create']);
Route::post('item', ['uses' => 'ItemController@store', 'as'=> 'item.store']);
Route::get('filter', ['uses' => 'ItemController@itemFilter', 'as'=>'item.itemFilter']);
Route::post('filter', ['uses' => 'ItemController@search', 'as'=>'item.search']);




