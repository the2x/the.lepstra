<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuProductModel extends Model
{
    protected $table = 'menu_product';
    public $timestamps = false;
    protected $fillable = ['menu_product_title', 'menu_product_link'];
}
