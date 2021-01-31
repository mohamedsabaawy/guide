<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model 
{

    protected $table = 'countries';
    public $timestamps = true;
    protected $fillable = array('name', 'user_id');

    public function Cities()
    {
        return $this->hasMany('App\Models\City');
    }

}