<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    public function contact(){
      return $this->hasMany('App\Contact','product_id','id');
    }
    public function gallery(){
      return $this->hasMany('App\Gallery','product_id','id');
    }
    public function coordinate(){
      return $this->hasMany('App\coordinate','product_id','id');
    }
}
