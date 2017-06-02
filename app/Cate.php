<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
protected $fillable=['cname'];
public $timestamps=false;

    public function post()
    {
       return $this->belongsTo('App\Post','id','cid');
}

}
