<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CategoryModel;
use App\MenuProductModel;
use App\AboutModel;
use GrahamCampbell\Markdown\Facades\Markdown;

class AboutController extends Controller
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
        $about = AboutModel::where('id', 1)->first();
        return view('about.about', ['menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu(), 'about' => $about,]);
    }


    public function create()
    {
        return view('about.create', ['menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


    public function store(Request $request)
    {
        $about = new AboutModel($request->all());
        $about->save();

        return redirect()->back()->withErrors('Страница сохранена');
    }


    public function update(Request $request)
    {
        AboutModel:: where('id', 1)
            ->update(
                [
                    'about' => Markdown::convertToHtml($request->about),
                ]
            );

        return redirect()->back()->withErrors('Страница обновлена');
    }


    public function edit()
    {

        $about = AboutModel::where('id', 1)->first();

        return view('about.edit', ['about' => $about, 'menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


}
