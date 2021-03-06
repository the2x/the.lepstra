<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = ['category', 'category_link'];
}
