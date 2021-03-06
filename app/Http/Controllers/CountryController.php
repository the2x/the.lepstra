<?php

namespace App\Http\Controllers;

use App\CountryModel;
use App\ProductModel;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use Validator;
use App\MenuProductModel;
use App\CategoryModel;
use DB;
use App\SizeModel;
use App\ColorModel;
use App\CompanyModel;

class CountryController extends Controller
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
        $country = CountryModel::all();
        return view('country.create', ['country' => $country, 'menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


    public function edit($id){
        $country = CountryModel::find($id);
        return view('country.edit', ['country' => $country, 'menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


    public function update(Request $request, $id, CountryRequest $validate)
    {
        Validator::make($request->all(), $validate->rules(), $validate->messages());
        CountryModel::find($id)->update(['country' => $request->country, 'country_link' => $request->country_link]);
        return redirect('/country/create')->withErrors('Страна обновлена');
    }


    public function store(Request $request, CountryRequest $validate){
        Validator::make($request->all(), $validate->rules(), $validate->messages());
        $country = new CountryModel($request->all());
        $country->save();
        return redirect('/country/create')->withErrors('Страна создана');
    }


    public function destroy($id){
        CountryModel::destroy($id);
        return redirect('/country/create')->withErrors('Страна удалена');
    }


    public function country_sidebar ()
    {
        $country_sidebar = CountryModel::all();
        return $country_sidebar;
    }


    public function company_sidebar()
    {
        $company_sidebar = CompanyModel::all();
        return $company_sidebar;
    }


    public function size_sidebar()
    {
        $size_sidebar = SizeModel::all();
        return $size_sidebar;
    }


    public function color_sidebar()
    {
        $color_sidebar = ColorModel::all();
        return $color_sidebar;
    }


    public function country_link($search_product)
    {
        $country_link = [];
        foreach ($search_product as $count => $product){
            array_push($country_link, DB::table('product')
                ->join('country', 'product.country', '=', 'country.country')
                ->where('product.id', $product->id)
                ->first());
        }

        return $country_link;
    }


    public function company_link($search_product)
    {
        $company_link = [];
        foreach ($search_product as $count => $product){
            array_push($company_link, DB::table('product')
                ->join('company', 'product.brand', '=', 'company.company')
                ->where('product.id', $product->id)
                ->first());
        }

        return $company_link;
    }


    public function category_link($search_product)
    {
        $category_link = [];
        foreach ($search_product as $count => $product){
            array_push($category_link, DB::table('product')
                ->join('category', 'product.categories', '=', 'category.category')
                ->where('product.id', $product->id)
                ->first());
        }

        return $category_link;
    }


    public function country_sort(Request $request)
    {

        $parse_url = $request->segment(3);
        $country = CountryModel::where('country_link', $parse_url)->first();
        $search_product = ProductModel::where('country', $country->country)
            ->orderBy('id', 'DESC')
            ->get();

        return view('country.sort', [
            'country' => $country,
            'search_product' => $search_product,
            'country_link' => $this->country_link($search_product),
            'company_link' => $this->company_link($search_product),
            'category_link' => $this->category_link($search_product),

            'menu_category' => $this->category_menu(),
            'menu_product' => $this->product_menu(),

            'country_sidebar' => $this->country_sidebar(),
            'company_sidebar' => $this->company_sidebar(),
            'size_sidebar' => $this->size_sidebar(),
            'color_sidebar' => $this->color_sidebar(),
        ]);
    }

}
