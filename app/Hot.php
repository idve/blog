<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hot extends Model
{
    //
     protected  $fillable=['id','nid','date','clicks','staus'];

    public function post()
    {
        return $this->belongsTo('App\Post','id','hid');
     }


}
