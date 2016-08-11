<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    protected $table = 'about';
    public $timestamps = false;
    protected $fillable = ['about'];
}
