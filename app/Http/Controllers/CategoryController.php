<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use App\SizeModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Validator;
use App\MenuProductModel;
use App\ProductModel;
use DB;
use App\ColorModel;
use App\CountryModel;
use App\CompanyModel;
use App\BrandLogoModel;

class CategoryController extends Controller
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


    public function list_category()
    {
        $brand_logo = BrandLogoModel::all();
        return view('category.list', ['brand_logo' => $brand_logo, 'menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


    public function create()
    {
        $cat = CategoryModel::all();
        return view('category.create', ['cat' => $cat, 'menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


    public function edit($id)
    {
        $cat = CategoryModel::find($id);
        return view('category.edit', ['cat' => $cat, 'menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


    public function update(Request $request, $id, CategoryRequest $validate)
    {
        Validator::make($request->all(), $validate->rules(), $validate->messages());
        CategoryModel::find($id)->update($request->all());
        return redirect()->back()->withErrors('Категория обновлена');
    }


    public function store(Request $request, CategoryRequest $validate)
    {
        Validator::make($request->all(), $validate->rules(), $validate->messages());
        $category = new CategoryModel($request->all());
        $category->save();
        return redirect()->back()->withErrors('Категория сохранена');
    }


    public function destroy($id)
    {
        CategoryModel::destroy($id);
        return redirect('/category/create');
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


    public function category_sort(Request $request)
    {

        $parse_url = $request->segment(3);
        $category = CategoryModel::where('category_link', $parse_url)->first();
        $search_product = ProductModel::where('categories', $category->category)
            ->orderBy('id', 'DESC')
            ->get();

        $brand_logo = BrandLogoModel::all();

        return view('category.sort',
            [
                'category' => $category,
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

                'brand_logo' => $brand_logo,
            ]);
    }


}
