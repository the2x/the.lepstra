<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeModel extends Model
{
    protected $table = 'size';
    public $timestamps = false;
    protected $fillable = ['size'];
}
