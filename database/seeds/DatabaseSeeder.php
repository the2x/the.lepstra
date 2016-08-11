<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(MenuProductSeeder::class);
        $this->call(LoginSeeder::class);
    }
}
