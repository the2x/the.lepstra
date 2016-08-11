<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CategoryModel;
use App\MenuProductModel;
use App\Http\Requests\ContactRequest;
use Validator;
use Mail;

class ContactController extends Controller
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
        return view('contact.contact', ['menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
    }


    public function mail($contact)
    {
        Mail::send('emails.contact', ['contact' => $contact], function ($message)
        {
            $message->from('the.lepstra@gmail.com', 'Интернет-магазин Lepstra');
            $message->to('the.lepstra@gmail.com', 'the.lepstra')->subject('Обратная связь');
        });
    }


    public function push(Request $request, ContactRequest $validate)
    {
        Validator::make($request->all(), $validate->rules(), $validate->messages());
        $contact = ['name' => $request->name, 'email' => $request->email, 'description' => $request->description];
        $this->mail($contact);
        return redirect()->back()->withErrors('Ваше сообщение отправлено');
    }


}
