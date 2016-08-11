<?php

Route::get('/', 'MainController@index');

Route::get('admin', 'AdminController@list_admin');

Route::post('filter', 'FilterController@filter');

Route::get('logout', 'LoginController@logout');

Route::group(['prefix' => 'enter'], function () {
    Route::get('/', 'LoginController@index');
    Route::post('/', 'LoginController@authenticate');
});


Route::group(['prefix' => 'about'], function () {
    Route::get('/', 'AboutController@index');
    Route::get('/create', 'AboutController@create');
    Route::post('/create', 'AboutController@store');
    Route::put('/edit', 'AboutController@update');
    Route::get('/edit', 'AboutController@edit');
});


Route::group(['prefix' => 'product'], function () {
    Route::get('/create', 'ProductController@create');
    Route::post('/create', 'ProductController@store');
    Route::get('/{id}', 'ProductController@show');
    Route::put('/{id}', 'ProductController@destroy');
    Route::put('/{id}/edit', 'ProductController@update');
    Route::get('/{id}/edit', 'ProductController@edit');

    Route::post('/{id}/order', 'ProductController@order');
    Route::post('/flush', 'ProductController@flush_order');
});


Route::group(['prefix' => 'basket'], function () {
    Route::get('/', 'ProductController@basket');
    Route::post('/finish', 'ProductController@basket_finish');
    Route::post('/{remove_item}/remove', 'ProductController@basket_remove_item');
});


Route::group(['prefix' => 'category'], function () {
    Route::get('/', 'CategoryController@list_category');
    Route::get('/create', 'CategoryController@create');
    Route::post('/store', 'CategoryController@store');
    Route::put('/{id}', 'CategoryController@destroy');
    Route::get('/{id}/edit', 'CategoryController@edit');
    Route::post('/{id}/edit', 'CategoryController@update');
    Route::get('/sort/{category}', 'CategoryController@category_sort');
});


Route::group(['prefix' => 'country'], function () {
    Route::get('/create', 'CountryController@create');
    Route::post('/store', 'CountryController@store');
    Route::put('/{id}', 'CountryController@destroy');
    Route::get('/{id}/edit', 'CountryController@edit');
    Route::post('/{id}/edit', 'CountryController@update');
    Route::get('/sort/{country}', 'CountryController@country_sort');
});


Route::group(['prefix' => 'company'], function () {
    Route::get('/create', 'CompanyController@create');
    Route::post('/store', 'CompanyController@store');
    Route::put('/{id}', 'CompanyController@destroy');
    Route::get('/{id}/edit', 'CompanyController@edit');
    Route::post('/{id}/edit', 'CompanyController@update');
    Route::get('/sort/{company}', 'CompanyController@company_sort');
});


Route::group(['prefix' => 'color'], function () {
    Route::get('/create', 'ColorController@create');
    Route::post('/store', 'ColorController@store');
    Route::put('/{id}', 'ColorController@destroy');
    Route::get('/{id}/edit', 'ColorController@edit');
    Route::put('/{id}/edit', 'ColorController@update');
});


Route::group(['prefix' => 'size'], function () {
    Route::get('/create', 'SizeController@create');
    Route::post('/store', 'SizeController@store');
    Route::put('/{id}', 'SizeController@destroy');
    Route::get('/{id}/edit', 'SizeController@edit');
    Route::post('/{id}/edit', 'SizeController@update');
});


Route::group(['prefix' => 'contact'], function () {
    Route::get('/', 'ContactController@index');
    Route::post('/', 'ContactController@push');
});