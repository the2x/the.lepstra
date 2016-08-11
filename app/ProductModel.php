<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    public $timestamps = true;
    protected $fillable = ['title', 'year',  'categories', 'description', 'country', 'brand', 'price'];
}
