<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dataes=['published_at'];
    protected $fillable=[
        'title','slug','content','thumb','user_id','cid','position',
    ];

    public function setTitleAttribute($value)
    {
        //当给title设置值时，slug
        $this->attributes['title']=$value;
        if(!$this->exits){
         //判断是否含有中文
            if (preg_match("/([\x81-\xfe][\x40-\xfe])/", $this->attributes['title'], $match)) {
               //把汉字转为拼音





            } else {
                $this->attributes['slug']=str_slug($value);
            }



        }
    }

    public function cate()
    {
        return $this->hasOne('App\Cate','id','cid');
    }
    

    
}
