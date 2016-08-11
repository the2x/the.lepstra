<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{

    public function run()
    {
        DB::table('country')->delete();

        DB::table('country')
            ->insert([
                ['country' => 'Россия', 'country_link' => 'russia'],
                ['country' => 'Беларусь', 'country_link' => 'belarus'],
            ]);
    }
}
