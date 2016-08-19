<?php

namespace App\Http\Controllers;

use App\BrandLogoModel;
use App\CompanyModel;
use App\CountryModel;
use Illuminate\Http\Request;
use App\CategoryModel;
use App\MenuProductModel;
use DB;
use App\SizeModel;
use App\ColorModel;
use App\ProductModel;

class FilterController extends Controller
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


    public function color_link(Request $request, $search_product)
    {
        $color_link = [];
        foreach ($search_product as $product) {
            array_push($color_link, in_array($request->color, explode(',', $product->color)));
        }

        return $color_link;
    }


    public function size_link(Request $request, $search_product)
    {
        $size_link = [];
        foreach ($search_product as $product) {
            array_push($size_link, in_array($request->size, explode(',', $product->size)));
        }

        return $size_link;
    }


    public function filter(Request $request)
    {

        $search_product = ProductModel::where('categories', $request->category)
            ->where('country', $request->country)
            ->where('brand', $request->company)
            ->orderBy('id', 'DESC')
            ->get();

        $brand_logo = BrandLogoModel::all();

        return view('filter.filter', [
            'search_product' => $search_product,
            'country_link' => $this->country_link($search_product),
            'company_link' => $this->company_link($search_product),
            'category_link' => $this->category_link($search_product),
            'color_link' => $this->color_link($request, $search_product),
            'size_link' => $this->size_link($request, $search_product),

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
