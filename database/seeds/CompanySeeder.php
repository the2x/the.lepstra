<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{

    public function run()
    {
        DB::table('company')->delete();

        DB::table('company')
            ->insert([
                ['company' => 'Adidas', 'company_link' => 'adidas', 'info' => 'Adidas — Немецкий промышленный концерн, специализирующийся на выпуске спортивной обуви, одежды и инвентаря. Генеральный директор компании — Герберт Хайнер. В настоящий момент компания ответственна за дистрибуцию продукции компаний Adidas, Reebok, Y-3, RBK & CCM Hockey, а также Taylor-Made Golf'],
                ['company' => 'Reebok', 'company_link' => 'reebok', 'info' => 'Reebok — международная компания по производству спортивной одежды и аксессуаров. Штаб-квартира расположена в пригороде Бостона Кэнтоне (штат Массачусетс). В настоящее время является дочерним подразделением компании Adidas.'],
            ]);
    }
}
