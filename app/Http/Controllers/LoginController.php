<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuProductModel;
use App\CategoryModel;
use Auth;
use Mail;

class LoginController extends Controller
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
        if(Auth::user()){
            return redirect('/');
        }else{
            return view('enter.login', ['menu_category' => $this->category_menu(), 'menu_product' => $this->product_menu()]);
        }
    }


    public function mail()
    {
        $login = 'Вошли в систему';
        Mail::send('emails.login', ['login' => $login], function ($message)
        {
            $message->from('the.lepstra@gmail.com', 'Интернет-магазин Lepstra');
            $message->to('the.lepstra@gmail.com', 'the.lepstra')->subject('Вошли в систему');
        });
    }


    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $this->mail();
            return redirect('/')->withErrors('Вы авторизированы');
        }else{
            return redirect()->back()->withErrors('Неверный email, или пароль');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
