<?php

namespace App\Http\Controllers;

use App\CompanyModel;
use App\ProductModel;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use Validator;
use DB;
use App\MenuProductModel;
use App\CategoryModel;
use App\SizeModel;
use App\ColorModel;
use App\CountryModel;

class CompanyController extends Controller
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
        $company = CompanyModel::all();
        return view('company.create',
            [
                'company' => $company,
                'menu_category' => $this->category_menu(),
                'menu_product' => $this->product_menu()
            ]);
    }


    public function edit($id)
    {
        $company = CompanyModel::find($id);
        return view('company.edit',
            [
                'company' => $company,
                'menu_category' => $this->category_menu(),
                'menu_product' => $this->product_menu()
            ]);
    }


    public function update(Request $request, $id, CompanyRequest $validate)
    {
        Validator::make($request->all(), $validate->rules(), $validate->messages());
        CompanyModel::where('id', $id)
            ->update(
                [
                    'company' => $request->company,
                    'company_link' => $request->company_link,
                    'info' => $request->info,
                ]);

        return redirect('/company/create')->withErrors('Компания обновлена');
    }


    public function store(Request $request, CompanyRequest $validate)
    {
        Validator::make($request->all(), $validate->rules(), $validate->messages());
        $company = new CompanyModel($request->all());
        $company->save();
        return redirect('/company/create')->withErrors('Компания сохранена');
    }


    public function destroy(Request $request, $id)
    {
        CompanyModel::destroy($id);
        return redirect('/company/create')->withErrors('Компания удалена');
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


    public function company_sort(Request $request)
    {

        $parse_url = $request->segment(3);
        $company = CompanyModel::where('company_link', $parse_url)->first();
        $search_product = ProductModel::where('brand', $company->company)
            ->orderBy('id', 'DESC')
            ->get();

        return view('company.sort', [
            'company' => $company,
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