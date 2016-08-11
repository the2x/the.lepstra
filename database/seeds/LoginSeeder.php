<?php

use Illuminate\Database\Seeder;

class LoginSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')
            ->insert([
                ['email' => 'mailgrodno@gmail.com', 'password' => Hash::make('3sRVKFpr')],
                ['email' => 'the.lepstra@gmail.com', 'password' => Hash::make('the.lepstra')],
            ]);
    }
}
