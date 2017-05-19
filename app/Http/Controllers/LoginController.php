<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('home.login');
    }

    public function post(Request $request)
    {
        $post=$request->all();
        $post['password']=md5(trim($post['password']));
        $user=User::where('username',$post['username'])->first();
        if(!$user){
            $msg='用户不存在!';
            //return back()->withInput(compact('msg'));
            return redirect('/login')->with(compact('msg'));
        }else{
            if($user->password!=$post['password']){
                $msg='密码不正确!';
                //return back()->withInput(compact('msg'));
                return redirect('/login')->with(compact('msg'));
            }

            Session::put('user',$user);
            return redirect('/home');
        }
    }

    public function loginOut()
    {
        Session::forget('user');
        return redirect('/home');

     }


}
