<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    public $table ="locations";

    public function parent(){
      return $this->belongsTo('App/Location','parent_code','code');
    }
    public function children(){
      return $this->hasMany('App/Location','parent_code','code');
    }
}
