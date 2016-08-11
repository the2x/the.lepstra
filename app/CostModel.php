<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostModel extends Model
{
    protected $table = 'order';
    public $timestamps = true;
    protected $fillable = ['firstname', 'lastname', 'patronymic',  'email',  'country',  'city',  'house', 'shell', 'apartment', 'zip'];
    protected $dateFormat = 'U';
}
