<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dataes=['published_at'];
    protected $fillable=[
        'title','slug','content','thumb',
    ];

    public function setTitleAttribute($value)
    {
        //当给title设置值时，slug
        $this->attributes['title']=$value;
        if(!$this->exits){
            $this->attributes['slug']=str_slug($value);
        }
    }

    
}
