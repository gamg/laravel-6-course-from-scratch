<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = 'vendedores';
    protected $primaryKey = 'codigo';
    protected $incrementing = false;
    protected $keyType = 'string';
    protected $timestamps = false;
    protected $dateFormat = 'Y-m-d';
    const CREATED_AT = 'create_date';
    const UPDATED_AT = 'last_update';
    protected $connection = 'pgsql';
    protected $attributes = ['age' => 18, 'address' => 'La cascada'];
}
