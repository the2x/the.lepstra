<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    protected $table = 'company';
    public $timestamps = false;
    protected $fillable = ['company', 'company_link', 'info'];
}
