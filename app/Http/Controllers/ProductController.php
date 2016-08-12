<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use App\ColorModel;
use App\CompanyModel;
use App\CostModel;
use App\CountryModel;
use App\MenuProductModel;
use App\OrderModel;
use App\SizeModel;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\ProductModel;
use Validator;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Session;
use DB;
use Mail;
use App\Http\Requests\AddressRequest;
use Carbon\Carbon;

class ProductController extends Controller
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


    public function company_all()
    {
        $company = CompanyModel::all();
        return $company;
    }

    public function category_all()
    {
        $categories = CategoryModel::all();
        return $categories;
    }


    public function country_all()
    {
        $country = CountryModel::all();
        return $country;
    }


    public function color_all()
    {
        $color = ColorModel::all();
        return $color;
    }


    public function size_all()
    {
        $size = SizeModel::all();
        return $size;
    }


    public function create()
    {
        return view('content.create',
            [
                'company' => $this->company_all(),
                'categories' => $this->category_all(),
                'country' => $this->country_all(),
                'color' => $this->color_all(),
                'size' => $this->size_all(),
                'menu_category' => $this->category_menu(),
                'menu_product' => $this->product_menu()
            ]);
    }


    public function create_size_product(Request $request, $product)
    {
        $arr_size = [];
        if (count($request->size) > 0) {
            foreach ($request->size as $size_item) {
                array_push($arr_size, $size_item);
            }

            $product->size = implode(',', $arr_size);
        }

        return $product;
    }


    public function create_color_product(Request $request, $product)
    {
        $arr_color = [];
        if (count($request->color) > 0) {
            foreach ($request->color as $color_item) {
                array_push($arr_color, $color_item);
            }

            $product->color = implode(',', $arr_color);
        }

        return $product;
    }


    public function create_cover_product(Request $request, $product)
    {
        if ($request->file('cover')) {
            $cover = Image::make($request->file('cover'))
                ->resizeCanvas(200, 250)
                ->save('_content/_cover/' . time() . '_' . $request->file('cover')->getClientOriginalName());

            $product->cover = $cover->basePath();
        }

        return $product;
    }


    public function create_gallery_product(Request $request, $product)
    {
        $product_photo = [];
        if (!in_array("", $request->file('photo'))) {
            foreach ($request->file('photo') as $request->photo) {
                $filename = time() . '_' . $request->photo->getClientOriginalName();
                $photo = Image::make($request->photo)
                    ->resizeCanvas(400, 500)
                    ->save('_content/_product/' . $filename);

                array_push($product_photo, $filename);
            }

            $product->photo = implode(',', $product_photo);
        }

        return $product;
    }


    public function store(Request $request, ProductRequest $validate)
    {
        Validator::make($request->all(), $validate->rules(), $validate->messages());

        $product = new ProductModel($request->all());
        $this->create_size_product($request, $product);
        $this->create_color_product($request, $product);
        $this->create_cover_product($request, $product);
        $this->create_gallery_product($request, $product);
        $product->save();

        Session::flash('success', 'Товар успешно добавлен');

        return redirect()->back()->withErrors('Товар успешно добавлен');
    }


    public function country_link_item($product)
    {
        $country_link_item = DB::table('product')
            ->join('country', 'product.country', '=', 'country.country')
            ->where('product.id', $product->id)
            ->first();

        return $country_link_item;
    }


    public function company_link_item($product)
    {
        $company_link_item = DB::table('product')
            ->join('company', 'product.brand', '=', 'company.company')
            ->where('product.id', $product->id)
            ->first();

        return $company_link_item;
    }


    public function category_link_item($product)
    {
        $category_link_item = DB::table('product')
            ->join('category', 'product.categories', '=', 'category.category')
            ->where('product.id', $product->id)
            ->first();

        return $category_link_item;
    }



    public function country_link($similar_product)
    {
        $country_link = [];
        foreach ($similar_product as $count => $product){
            array_push($country_link, DB::table('product')
                ->join('country', 'product.country', '=', 'country.country')
                ->where('product.id', $product->id)
                ->first());
        }

        return $country_link;
    }


    public function company_link($similar_product)
    {
        $company_link = [];
        foreach ($similar_product as $count => $product){
            array_push($company_link, DB::table('product')
                ->join('company', 'product.brand', '=', 'company.company')
                ->where('product.id', $product->id)
                ->first());
        }

        return $company_link;
    }


    public function category_link($similar_product)
    {
        $category_link = [];
        foreach ($similar_product as $count => $product){
            array_push($category_link, DB::table('product')
                ->join('category', 'product.categories', '=', 'category.category')
                ->where('product.id', $product->id)
                ->first());
        }

        return $category_link;
    }


    public function show($id)
    {

        $product = ProductModel::find($id);
        $brand = CompanyModel::where('company', $product->brand)->first();
        $similar_product = ProductModel::orderByRaw("RAND()")->take(3)->get();

        return view('content.show',
            [
                'brand' => $brand,
                'product' => $product,

                'country_link_item' => $this->country_link_item($product),
                'company_link_item' => $this->company_link_item($product),
                'category_link_item' => $this->category_link_item($product),

                'similar_product' => $similar_product,

                'category_link' => $this->category_link($similar_product),
                'country_link' => $this->country_link($similar_product),
                'company_link' => $this->company_link($similar_product),

                'menu_product' => $this->product_menu(),
                'menu_category' => $this->category_menu()
            ]);
    }


    public function edit($id)
    {
        $product = ProductModel::find($id);

        return view('content.edit',
            [
                'product' => $product,
                'company' => $this->company_all(),
                'categories' => $this->category_all(),
                'country' => $this->country_all(),
                'color' => $this->color_all(),
                'size' => $this->size_all(),
                'menu_product' => $this->product_menu(),
                'menu_category' => $this->category_menu()
            ]);
    }


    public function update_cover_product(Request $request, $id)
    {
        if ($request->file('cover')) {
            $cover = Image::make($request->file('cover'))
                ->resizeCanvas(190, 285)
                ->save('_content/_cover/' . time() . '_' . $request->file('cover')->getClientOriginalName());

            ProductModel::where('id', $id)
                ->update([
                    'cover' => $cover->basePath(),
                ]);
        }

        return $request->file('cover');
    }


    public function update_color_product(Request $request)
    {
        $arr_color = [];
        if (count($request->color) > 0) {
            foreach ($request->color as $color_item) {
                array_push($arr_color, $color_item);
            }
        }

        return $arr_color;
    }


    public function update_gallery_product(Request $request, $id)
    {
        $product_photo = [];
        if (!in_array('', $request->file('photo'))) {
            foreach ($request->file('photo') as $request->photo) {
                $filename = time() . '_' . $request->photo->getClientOriginalName();
                $photo = Image::make($request->photo)
                    ->resizeCanvas(400, 600)
                    ->save('_content/_product/' . $filename);

                array_push($product_photo, $filename);
            }

            ProductModel::where('id', $id)
                ->update([
                    'photo' => implode(',', $product_photo),
                ]);
        }

        return $product_photo;
    }


    public function update_size_product(Request $request)
    {
        $arr_size = [];
        if (count($request->size) > 0) {
            foreach ($request->size as $size_item) {
                array_push($arr_size, $size_item);
            }
        }

        return $arr_size;
    }


    public function status($status)
    {
        if($status){
            $status_icon = $status;
        }else{
            $status_icon = '';
        }

        return $status_icon;
    }


    public function update(Request $request, $id, UpdateProductRequest $validate)
    {
        Validator::make($request->all(), $validate->rules(), $validate->messages());

        $this->update_cover_product($request, $id);
        $this->update_gallery_product($request, $id);

        ProductModel::where('id', $id)
            ->update([
                'title' => $request->title,
                'categories' => $request->categories,
                'brand' => $request->brand,
                'country' => $request->country,
                'year' => $request->year,
                'size' => implode(',', $this->update_size_product($request)),
                'description' => $request->description,
                'price' => $request->price,
                'new_status' => $this->status($request->new_status),
                'sale_status' => $this->status($request->sale_status),
                'wow_status' => $this->status($request->wow_status),
                'color' => implode(',', $this->update_color_product($request)),
            ]);

        return redirect('/product/' . $id)->withErrors('Продукт обновлен');
    }


    function search_title($id)
    {
        $file_name_order = ProductModel::find($id)->title;
        return $file_name_order;
    }


    public function order(Request $request, $id)
    {
        $price = ProductModel::find($id)->first();

        $order = [
            'order_id' => $id,
            'order_title' => $this->search_title($id),
            'order_size' => $request->size,
            'order_count' => $request->user_order_count,
            'order_color' => $request->color,
            'order_price' => $price->price,
        ];

        Session::push('order', $order);
        return redirect()->back();
    }


    public function flush_order()
    {
        Session::forget('order');
        return redirect()->back();
    }


    public function basket()
    {
        $cost = 0;
        if (Session::get('order')) {
            foreach (Session::get('order') as $value) {
                $cost = ($value['order_count'] * $value['order_price']) + $cost;
            }
        }

        return view('content.basket', [
            'menu_product' => $this->product_menu(),
            'menu_category' => $this->category_menu(),
            'cost' => $cost,
        ]);
    }


    public function basket_remove_item($remove_item)
    {

        $all_orders = Session::get('order');

        foreach ($all_orders as $key => $value) {
            if ($key == $remove_item) {
                unset($all_orders[$key]);
                Session::set('order', $all_orders);
            }
        }

        return redirect('/basket');
    }


    public function destroy($id)
    {
        ProductModel::destroy($id);
        return redirect('/product/create');
    }


    public function order_item_product_desc()
    {
        $chop = " ";
        foreach (Session::get('order') as $value) {
            $chop = "Номер:" . $value['order_id'] . "; Название: " . $value['order_title'] . "; Размер: " . $value['order_size'] . "; Цвет: " . $value['order_color'] . "; Количество: " . $value['order_count'] . "; Цена за ед: " . $value['order_price'] . "<br />" . $chop;
        }

        return $chop;
    }


    public function order_item_product_cost()
    {
        $cost = 0;
        foreach (Session::get('order') as $value) {
            $cost = ($value['order_count'] * $value['order_price']) + $cost;
        }

        return $cost;
    }


    public function order_item_order_by_id()
    {
        $order = OrderModel::orderBy('id', 'desc')->first();
        return $order;
    }


    public function mail(Request $request)
    {
        Mail::send('emails.reminder', ['order' => $this->order_item_order_by_id()], function ($message) use ($request) {
            $message->from('the.lepstra@gmail.com', 'Интернет-магазин Lepstra');
            $message->to($request->email, $request->firstname . " " . $request->lastname)->subject('Заказ оформлен');
            $message->to('the.lepstra@gmail.com', 'the.lepstra')->subject('Заказ оформлен');
        });
    }


    public function basket_finish(Request $request, AddressRequest $validate)
    {
        Validator::make($request->all(), $validate->rules(), $validate->messages());

        $finish_order = new CostModel($request->all());
        $finish_order->order = $this->order_item_product_desc();;
        $finish_order->cost = $this->order_item_product_cost();
        $finish_order->created_at = Carbon::now('Europe/Minsk');
        $finish_order->save();

        $this->mail($request);

        Session::flush();

        return redirect()->to('/');
    }


}