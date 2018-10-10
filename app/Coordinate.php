<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    protected $table='coordinates';

    protected $fillable = ['product_id','long','lat'];
}
