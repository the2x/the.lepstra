<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorModel extends Model
{
    protected $table = 'color';
    public $timestamps = false;
    protected $fillable = ['color'];
}
