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
    .msg-success{
        text-align: center;
        background-color: #eeffcb;
        height:40px;
    }
    .success{
        font-size:14px;
        color:#449d44;
        padding:15px 0;
        line-height: 40px;
    }
</style>


@stop

@section('scripts')
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <script>
        $(function(){
            $("#input-cate").click(function(){
                $.ajax({
                    type: "POST",
                    url:"{{url('/cate/store')}}",
                    data:$('#cateform').serialize(),// 你的formid
                    async: false,
                    success: function(data) {
                        console.log(data);
                        if(data.code==200){
                            $("#msg-addCate").addClass("success");
                            $("#msg-addCate").parent().addClass("msg-success");
                            $("#msg-addCate").text('添加成功');
                            $("#cate-name").attr('value');
                            $("#cid").prepend('<option value="'+data.data.id+'" selected="selected">'+data.data.cname+'</option>');
                        }else{
                            $("#msg-addCate").text('添加失败');
                        }
                    }
                });
            });
        });
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
            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
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
                <span class="text"><botton class="btn" data-toggle="modal" data-target="#createCate">创建分类</botton></span>
                <select name="cid" id="cid" class="form-control">
                    <option value="0" >未分类</option>
                    @foreach($cates as $cate)
                    <option value="{{$cate->id}}">{{$cate->cname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content" >内容：</label>
                <div>
                    <script id="editor" type="text/plain" style="width:100%;height:350px;"></script></div>
                    <div id="btns"><script type="text/javascript">var ue = UE.getEditor('editor')</script></div>
            </div>
            <div class="form-group">
                <label for="">是否重点推荐</label>
                <input type="radio" name="position" value="1">是
                <input type="radio" name="position" value="0" checked>否
            </div>
            <div class="form-group">
                <button class="btn btn-large form-control btn-block btn-primary" type="submit">发&nbsp;&nbsp;&nbsp;&nbsp;布</button>
            </div>
        </form>
    </div>
    </div>
</div>
        {{--添加模板框--}}
        <div class="modal fade" id="createCate" tabindex="-1" role="dialog" aria-labelledby="ecreateCateLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="ecreateCateLabel">创建分类</h4>
                    </div>
                    <div class=""><span id="msg-addCate" class=""></span></div>
                    <div class="modal-body">
                        <form id="cateform">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label for="recipient-name" class="control-label">分类名称：</label>
                                <input type="text" class="form-control" name="cname" id="cate-name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="input-cate"  class="btn btn-primary">保存</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">@include('layouts.home_footer')</div>
@stop