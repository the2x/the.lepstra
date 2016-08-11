<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Size extends Migration
{
    public function up()
    {
        Schema::create('size', function (Blueprint $table) {
            $table->increments('id');
            $table->string('size');
            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::dropIfExists('size');
    }
}
