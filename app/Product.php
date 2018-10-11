<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    public function category(){
      return $this->belongsTo('App\Category','category_id','id');
    }
    public function contact(){
      return $this->hasOne('App\Contact','product_id','id');
    }
    public function gallery(){
      return $this->hasMany('App\Gallery','product_id','id');
    }
    public function coordinate(){
      return $this->hasMany('App\Coordinate','product_id','id');
    }
}
