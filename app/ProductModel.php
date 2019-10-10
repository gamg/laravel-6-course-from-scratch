<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $with = ['product'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
