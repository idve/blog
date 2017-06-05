<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hot extends Model
{
    //
     protected  $fillable=['id','nid','date','clicks','status'];
     public $timestamps=false;

    public function post()
    {
        return $this->belongsTo('App\Post','id','nid');
     }


}
