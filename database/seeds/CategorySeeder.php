<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->delete();

        DB::table('category')
            ->insert([
                ['category' => 'Футболки', 'category_link' => 't-shirt'],
                ['category' => 'Джоггеры', 'category_link' => 'jogger'],
                ['category' => 'Свитшоты', 'category_link' => 'sweater'],
                ['category' => 'Бейсболки', 'category_link' => 'cap'],
                ['category' => 'Анораки', 'category_link' => 'anorak'],
                ['category' => 'Кеды', 'category_link' => 'shoes'],
                ['category' => 'Рюкзаки', 'category_link' => 'backpack'],
                ['category' => 'Куртки', 'category_link' => 'jackets'],
                ['category' => 'Шорты', 'category_link' => 'shorts'],
                ['category' => 'Аксессуары', 'category_link' => 'accessories'],
            ]);
    }
}
