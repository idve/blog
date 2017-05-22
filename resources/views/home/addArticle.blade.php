@extends('layouts.home_layout')
@section('head-title')文章@stop

@section('style')
<style>
    .form-horizontal  {
        display: block;
        font-weight: 700;
        padding: 35px 0;
        margin-bottom: 20px;
    }
    .heading{
        font-size: 35px;
        text-align:center;
    }
    .form-group label{
        margin:10px 0;

    }
    .text{
        font-size:16px;
        color:#8ac007;
    }
    .form-control{
        padding:0 15px;
        font-size:16px;

    }
    #clear-btn{
        font-size: 14px;
    }
    .btn-primary{
        padding:1px 0;
        font-size:25px;
        font-weight: 600;
    }
</style>


@stop

@section('scripts')
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <script>
    </script>

@stop


@section('main')
        <!-- header -->
<div class="header">@include('layouts.home_header')</div>
<div class="main">

    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" action="{{URL('/article/store')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="user_id" value="{{Session::get('user')->id }}">

                <div class="form-group ">
                    <span class="heading" >添加文章</span>
                </div>

            <div class="form-group">
                <label  >标题：</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label >分类：</label>
                <span class="text"><botton class="btn" onclick="">创建分类</botton></span>
                <select name="cate" class="form-control">
                    <option value="1">laravel学习</option>
                    <option value="2">诗情画意</option>
                    <option value="3">asff</option>
                    <option value="4">777</option>
                    <option value="5">oooi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="content" >内容：</label>
                <div>
                    <script id="editor" type="text/plain" style="width:100%;height:350px;"></script></div>
                    <div id="btns"><script type="text/javascript">var ue = UE.getEditor('editor')</script></div>
            </div>
            <div class="form-group">
                <button class="btn btn-large form-control btn-block btn-primary" type="submit">发&nbsp;&nbsp;&nbsp;&nbsp;布</button>
            </div>
        </form>

    </div>
    </div>

</div>


<div class="footer">@include('layouts.home_footer')</div>
@stop