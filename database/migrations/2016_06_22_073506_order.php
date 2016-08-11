<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->text('order');
            $table->text('cost');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('patronymic');
            $table->string('email');
            $table->string('country');
            $table->string('city');
            $table->string('house');
            $table->string('shell');
            $table->string('apartment');
            $table->string('zip');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('order');
    }
}
