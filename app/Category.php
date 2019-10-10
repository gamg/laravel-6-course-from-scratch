<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function productModels()
    {
        return $this->hasManyThrough('App\ProductModel', 'App\Product');
    }
}
