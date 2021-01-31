<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model 
{

    protected $table = 'hotel_rooms';
    public $timestamps = true;
    protected $fillable = array('name', 'hotel_id', 'client_id');

    public function Hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function Client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}