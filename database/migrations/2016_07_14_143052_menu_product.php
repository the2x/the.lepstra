<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuProduct extends Migration
{
    public function up()
    {
        Schema::create('menu_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_product_title');
            $table->string('menu_product_link');
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_product');
    }
}
