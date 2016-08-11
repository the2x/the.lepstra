<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{

    public function run()
    {
        DB::table('color')->delete();

        DB::table('color')
            ->insert([
                ['color' => 'Черный'],
                ['color' => 'Серый'],
                ['color' => 'Красный'],
                ['color' => 'Зеленый'],
                ['color' => 'Синий'],
                ['color' => 'Желтый'],
                ['color' => 'Белый'],
            ]);

    }
}
