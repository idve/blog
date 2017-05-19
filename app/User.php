<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static function createUserToken($user){
        $uid = md5($user->userID);
        $akey = md5(Config::get('app.key'));
        $times=time()+Config::get('session.lifetime')*60;
        $tokenInfo = ['uid'=>$uid, 'akey'=>$akey, 'expire'=>$times ];
        Cache::put($uid, $user,$times);
        $user['token'] = Crypt::encrypt($tokenInfo);

    }


}
