<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use App\MenuProductModel;

class MainController extends Controller
{

    public function category_menu()
    {
        $menu_category = CategoryModel::all();
        return $menu_category;
    }


    public function product_menu()
    {
        $menu_product = MenuProductModel::all();
        return $menu_product;
    }


    public function index()
    {
        return view('welcome', ['menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }

}
