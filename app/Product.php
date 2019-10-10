<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->as('info')->withTimestamps();
    }

    public function productModels()
    {
        return $this->hasMany('App\ProductModel');
    }
}
