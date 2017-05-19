@extends('layouts.home_layout')
@section('head-title')文章@stop
@section('style')
 <style>
    .img-text{
        float:left;
    }

     .content-edit{
         float:right;
         margin-right: 5px;
     }
    li {
        word-break: break-all;
        word-wrap: break-word;
    }
    .list-group-item{

    }

 </style>
@section('main')
        <!-- header -->
<div class="header">@include('layouts.home_header')</div>
<div class="main">

    <div class="container">
        <h1>文章<small>&nbsp;&nbsp;列表</small></h1>

        <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
        @if(Session::has('user'))
            <div class="" style="">
            <a href="{{url('/home/article/add')}}"><span style=" font-size:24px;height:60px;width:40%;margin:0px auto;" type="button" class="btn btn-success btn-lg btn-block active">添加文章</span></a>
            </div>
        @endif
        <ul class="list-group ">
            @foreach ($posts as $post)
                <li class="list-group-item" style="border:none;">
                    <a href="/home/article/{{ $post->slug }}"><h2><strong>{{ $post->title }}</strong></h2></a>
                    <em><small>发布于：{{ $post->published_at }}</small></em>

                    <div class="content clearfix">
                        {{ $post->thumb }}
                        <div class="img-text">{!!str_limit(nl2br(strip_tags($post->content),200))!!}</div>
                        <br>
                        @if(Session::has('user'))
                            <div class="content-edit"><a  href="#">[编辑]</a><a  href="#">&nbsp;[删除]</a></div>
                        @endif
                    </div>

                </li>
            @endforeach
        </ul>
        {!! $posts->render() !!}
    </div>

</div>
<div class="footer">@include('layouts.home_footer')</div>
@stop