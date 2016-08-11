<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SizeModel;
use App\MenuProductModel;
use App\CategoryModel;

class SizeController extends Controller
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


    public function create(){
        $size = SizeModel::all();

        return view('size.create', [
            'size' => $size,
            'menu_product' => $this->product_menu(),
            'menu_category' => $this->category_menu(),
        ]);
    }


    public function edit($id){
        $size = SizeModel::find($id);

        return view('size.edit', [
            'size' => $size,
            'menu_product' => $this->product_menu(),
            'menu_category' => $this->category_menu(),
        ]);
    }


    public function update(Request $request, $id){
        SizeModel::find($id)->update(['size' => $request->edit_size]);
        return redirect('/size/create')->withErrors('Размер обновлен');
    }


    public function store(Request $request){
        $size = new SizeModel($request->all());
        $size->save();
        return redirect('/size/create')->withErrors('Размер сохранен');
    }


    public function destroy($id){
        SizeModel::destroy($id);
        return redirect('/size/create')->withErrors('Размер удален');
    }
}
