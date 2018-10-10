<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable=['product_id','name','phone','email'];

    function product(){
      return $this->belongsTo('App\Product','product_id','id');
    }
}
