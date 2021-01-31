<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use function App\Sabaawy\responseJson;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Client extends Authenticate implements JWTSubject
{


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'cover');

    public function Rooms()
    {
        return $this->hasMany('App\Models\HotelRoom');
    }

    public function Reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

}