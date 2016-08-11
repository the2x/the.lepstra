<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{

    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('year');
            $table->string('cover');
            $table->string('categories');
            $table->text('description');
            $table->text('photo');
            $table->string('country');
            $table->text('size');
            $table->text('color');
            $table->text('brand');
            $table->decimal('price');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('product');
    }
}
