<?php

use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{

    public function run()
    {
        DB::table('size')->delete();

        DB::table('size')
            ->insert([
                ['size' => 'XS'],
                ['size' => 'S'],
                ['size' => 'M'],
                ['size' => 'L'],
                ['size' => 'XL'],
                ['size' => 'XXL'],
            ]);
    }
}
