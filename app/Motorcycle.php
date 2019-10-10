<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    protected $fillable = ['brand', 'model', 'code'];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function userPersonalData()
    {
        return $this->hasOneThrough('App\PersonalData', 'App\User');
    }
}
