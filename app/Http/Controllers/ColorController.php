<?php

namespace App\Http\Controllers;

use App\ColorModel;
use Illuminate\Http\Request;
use App\MenuProductModel;
use App\CategoryModel;

class ColorController extends Controller
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


    public function create()
    {
        $color = ColorModel::all();
        return view('color.create', ['color' => $color, 'menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


    public function edit($id)
    {
        $color = ColorModel::find($id);
        return view('color.edit', ['color' => $color, 'menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


    public function update(Request $request, $id)
    {
        ColorModel::where('id', $id)->update(['color' => $request->color]);
        return redirect('/color/create')->withErrors('Цвет обновлен');
    }


    public function store(Request $request)
    {
        $color = new ColorModel($request->all());
        $color->save();
        return redirect('/color/create')->withErrors('Цвет сохранен');
    }


    public function destroy($id)
    {
        ColorModel::destroy($id);
        return redirect('/color/create')->withErrors('Цвет удален');
    }


}
