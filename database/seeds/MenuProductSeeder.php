<?php

use Illuminate\Database\Seeder;

class MenuProductSeeder extends Seeder
{

    public function run()
    {
        DB::table('menu_product')->delete();

        DB::table('menu_product')
            ->insert([
                ['menu_product_title' => 'Создать лого бренда', 'menu_product_link' => '/brand/create'],
                ['menu_product_title' => 'Создать продукт', 'menu_product_link' => '/product/create'],
                ['menu_product_title' => 'Создать компанию', 'menu_product_link' => '/company/create'],
                ['menu_product_title' => 'Создать категорию', 'menu_product_link' => '/category/create'],
                ['menu_product_title' => 'Создать страну', 'menu_product_link' => '/country/create'],
                ['menu_product_title' => 'Создать цвет', 'menu_product_link' => '/color/create'],
                ['menu_product_title' => 'Создать размер', 'menu_product_link' => '/size/create'],
                ['menu_product_title' => 'Создать страницу о нас', 'menu_product_link' => '/about/create'],
            ]);
    }
}
