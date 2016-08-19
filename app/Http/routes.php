<?php

Route::get('/', 'MainController@index');

Route::get('admin', 'AdminController@list_admin')->middleware(['auth']);

Route::post('filter', 'FilterController@filter');

Route::get('logout', 'LoginController@logout');

Route::group(['prefix' => 'enter'], function () {
    Route::get('/', 'LoginController@index');
    Route::post('/', 'LoginController@authenticate');
});


Route::group(['prefix' => 'about'], function () {
    Route::get('/', 'AboutController@index');
    Route::get('/create', 'AboutController@create')->middleware(['auth']);
    Route::post('/create', 'AboutController@store')->middleware(['auth']);
    Route::put('/edit', 'AboutController@update')->middleware(['auth']);
    Route::get('/edit', 'AboutController@edit')->middleware(['auth']);
});


Route::group(['prefix' => 'product'], function () {
    Route::get('/create', 'ProductController@create')->middleware(['auth']);
    Route::post('/create', 'ProductController@store')->middleware(['auth']);
    Route::get('/{id}', 'ProductController@show');
    Route::put('/{id}', 'ProductController@destroy')->middleware(['auth']);
    Route::put('/{id}/edit', 'ProductController@update')->middleware(['auth']);
    Route::get('/{id}/edit', 'ProductController@edit')->middleware(['auth']);

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
    Route::get('/create', 'CategoryController@create')->middleware(['auth']);;
    Route::post('/store', 'CategoryController@store')->middleware(['auth']);;
    Route::put('/{id}', 'CategoryController@destroy')->middleware(['auth']);;
    Route::get('/{id}/edit', 'CategoryController@edit')->middleware(['auth']);;
    Route::post('/{id}/edit', 'CategoryController@update')->middleware(['auth']);
    Route::get('/sort/{category}', 'CategoryController@category_sort');
});


Route::group(['prefix' => 'country'], function () {
    Route::get('/create', 'CountryController@create')->middleware(['auth']);;
    Route::post('/store', 'CountryController@store')->middleware(['auth']);;
    Route::put('/{id}', 'CountryController@destroy')->middleware(['auth']);;
    Route::get('/{id}/edit', 'CountryController@edit')->middleware(['auth']);;
    Route::post('/{id}/edit', 'CountryController@update')->middleware(['auth']);;
    Route::get('/sort/{country}', 'CountryController@country_sort');
});


Route::group(['prefix' => 'company'], function () {
    Route::get('/create', 'CompanyController@create')->middleware(['auth']);;
    Route::post('/store', 'CompanyController@store')->middleware(['auth']);;
    Route::put('/{id}', 'CompanyController@destroy')->middleware(['auth']);;
    Route::get('/{id}/edit', 'CompanyController@edit')->middleware(['auth']);;
    Route::post('/{id}/edit', 'CompanyController@update')->middleware(['auth']);;
    Route::get('/sort/{company}', 'CompanyController@company_sort');
});


Route::group(['middleware' => 'auth', 'prefix' => 'color'], function () {
    Route::get('/create', 'ColorController@create');
    Route::post('/store', 'ColorController@store');
    Route::put('/{id}', 'ColorController@destroy');
    Route::get('/{id}/edit', 'ColorController@edit');
    Route::put('/{id}/edit', 'ColorController@update');
});


Route::group(['middleware' => 'auth', 'prefix' => 'size'], function () {
    Route::get('/create', 'SizeController@create');
    Route::post('/store', 'SizeController@store');
    Route::put('/{id}', 'SizeController@destroy');
    Route::get('/{id}/edit', 'SizeController@edit');
    Route::post('/{id}/edit', 'SizeController@update');
});


Route::group(['middleware' => 'auth', 'prefix' => 'brand'], function () {
    Route::get('/create', 'BrandLogoController@create');
    Route::post('/store', 'BrandLogoController@store');
    Route::put('/{id}', 'BrandLogoController@destroy');
    Route::get('/{id}/edit', 'BrandLogoController@edit');
    Route::post('/{id}/edit', 'BrandLogoController@update');
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('/', 'ContactController@index');
    Route::post('/', 'ContactController@push');
});