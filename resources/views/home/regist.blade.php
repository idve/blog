@extends('layouts.home_layout')
@section('scripts')
    <script src="{{asset('validate/jquery.validate.js')}}"></script>
    <script src="{{asset('validate/jquery.validate.messages_zh.js')}}"></script>
    <link href="{{asset('validate/smoothness/jquery-ui-1.10.3.custom.css')}}">

    @stop

@section('main')
    <script>
        $(function(){
            $("form").validate();
        });
    </script>

    <div class="container">

        <div class="form row">
            <form class="form-horizontal col-sm-offset-3 col-md-offset-3" action="" method="post">
                {{csrf_field()}}
                <h1 class="form-title">注册</h1>
                <div class="col-sm-9 col-md-9">

                  <div class="form-group form-group-sm">
                      <label class="" for="inputname1">用户名：</label>
                      <i class="fa fa-user fa-lg"></i>
                      <input type="text" name="name" class="form-control required" id="inputname1" >
                  </div>
                <div class="form-group form-group-sm">
                    <label for="inputname1">密码：</label>
                    <div>
                        <input type="text" name="name" class="form-control" id="inputname1" >
                    </div>
                </div>

                <div class="form-group form-group-sm">
                    <label for="inputname1">再次输入密码：</label>
                    <div>
                        <input type="text" name="name" class="form-control" id="inputname1" >
                    </div>
                </div>

                <div class="form-group form-group-sm">
                    <label for="inputname1">邮箱：</label>
                    <div>
                        <input type="text" name="name" class="form-control" id="inputname1" >
                    </div>
                </div>

                <div class="form-group form-group-sm">
                    <label for="inputname1">出生日期：</label>
                    <div>
                        <input type="text" name="name" class="form-control" id="inputname1" >
                    </div>
                </div>

                <div class="form-group form-group-sm">
                    <label for="inputname1">出生日期：</label>
                    <div>
                        <input type="submit"  class="btn btn-info btn-lg btn-success" value="登陆 " >
                    </div>
                </div>
                    <div></div>


                </div>
            </form>

        </div>
    </div>


    @stop
