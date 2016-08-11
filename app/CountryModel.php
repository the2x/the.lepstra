<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    protected $table = 'country';
    public $timestamps = false;
    protected $fillable = ['country', 'country_link'];
}
