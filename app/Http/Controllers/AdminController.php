<?php

namespace App\Http\Controllers;

use App\MenuProductModel;
use App\CategoryModel;

class AdminController extends Controller
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


    public function list_admin()
    {
        return view('admin.list', ['menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


}
