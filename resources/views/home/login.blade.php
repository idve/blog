@extends('layouts.home_layout')
<style>
    .bkhome{
        font-size:16px;
        margin-right:10px;
        color:#0f0f0f;
    }
    .form-bg{
        height:100%;
        background: #66677c;
    }
    .form-horizontal{
        background: #fff;
        padding-bottom: 40px;
        border-radius: 15px;
        text-align: center;
    }
    .form-horizontal .heading{
        display: block;
        font-size: 35px;
        font-weight: 700;
        padding: 35px 0;
        border-bottom: 1px solid #f0f0f0;
        margin-bottom: 30px;
    }
    .form-horizontal .form-group{
        padding: 0 40px;
        margin: 0 0 25px 0;
        position: relative;
    }
    .form-horizontal .form-control{
        font-size:16px;
        background: #f0f0f0;
        border: none;
        border-radius: 20px;
        box-shadow: none;
        padding: 0 20px 0 45px;
        height: 40px;
        transition: all 0.3s ease 0s;
    }
    .form-horizontal .form-control:focus{
        background: #e0e0e0;
        box-shadow: none;
        outline: 0 none;
    }
    .form-horizontal .form-group i{
        position: absolute;
        top: 12px;
        left: 60px;
        font-size: 17px;
        color: #c8c8c8;
        transition : all 0.5s ease 0s;
    }
    .form-horizontal .form-control:focus + i{
        color: #00b4ef;
    }
    .form-horizontal .fa-question-circle{
        display: inline-block;
        position: absolute;
        top: 12px;
        right: 60px;
        font-size: 20px;
        color: #808080;
        transition: all 0.5s ease 0s;
    }
    .form-horizontal .fa-question-circle:hover{
        color: #000;
    }
    .form-horizontal .main-checkbox{
        float: left;
        width: 20px;
        height: 20px;
        background: #11a3fc;
        border-radius: 50%;
        position: relative;
        margin: 5px 0 0 5px;
        border: 1px solid #11a3fc;
    }
    .form-horizontal .main-checkbox label{
        width: 20px;
        height: 20px;
        position: absolute;
        top: 0;
        left: 0;
        cursor: pointer;
    }
    .form-horizontal .main-checkbox label:after{
        content: "";
        width: 10px;
        height: 5px;
        position: absolute;
        top: 5px;
        left: 4px;
        border: 3px solid #fff;
        border-top: none;
        border-right: none;
        background: transparent;
        opacity: 0;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }
    .form-horizontal .main-checkbox input[type=checkbox]{
        visibility: hidden;
    }
    .form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
        opacity: 1;
    }
    .form-horizontal .text{
        float: left;
        margin-left: 7px;
        line-height: 20px;
        padding-top: 5px;
        text-transform: capitalize;
    }
    .form-horizontal .btn{
        float: right;
        font-size: 14px;
        color: #fff;
        background: #00b4ef;
        border-radius: 30px;
        padding: 10px 25px;
        border: none;
        text-transform: capitalize;
        transition: all 0.5s ease 0s;
    }
    @media only screen and (max-width: 479px){
        .form-horizontal .form-group{
            padding: 0 25px;
        }
        .form-horizontal .form-group i{
            left: 45px;
        }
        .form-horizontal .btn{
            padding: 10px 20px;
        }
    }

    .header{
        padding:15px 0px;
        background: #66677c;
        text-align:center;
    }
    .errors span{
        display:block;
        height:16px;
      color:#ff0000;
        font-size:16px;


    }


</style>
@section('main')

        <div class="form-bg">
            <div class="header">
                <h1>小窝博客</h1>
                <span>欢迎您</span>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <form class="form-horizontal" action="{{URL('/login/post/')}}" method="post">
                            {{csrf_field()}}
                            <span class="heading">用户登录<span class="pull-right bkhome form-group"><a href="{{asset('/')}}">返回首页</a></span></span>
                            <div class="form-group errors" ><span>@if(Session::has('msg')){{Session::get('msg')}}@endif</span></div>

                            <div class="form-group">
                                <input type="text" name="username" onblur=error("inputEmail3","用户名") class="form-control" id="inputEmail3"  autofocus placeholder="用户名">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="form-group help">
                                <input type="password" name="password" class="form-control" onblur=error("inputPassword3","密码名") id="inputPassword3" placeholder="密　码">
                                <i class="fa fa-lock"></i>
                                <a href="#" class="fa fa-question-circle"></a>
                            </div>
                            <div  class="form-group">
                                 <div class="errors">
                                     <span id="errormsg"></span>
                                 </div>

                            </div>
                            <div class="form-group">
                                <div class="main-checkbox">
                                    <input type="checkbox" value="1" id="checkbox1" name="remember_token">
                                    <label for="checkbox1"></label>
                                </div>
                                <span class="text">记住我</span>
                                <button type="submit"   class="btn btn-default">登录</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@stop

