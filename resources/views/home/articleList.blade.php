@extends('layouts.home_layout')
@section('head-title')文章@stop
@section('style')
 <style>
    .img-img{
        float:left;
        margin-right: 5px;
    }
    .img-img img{
        width:200px;
    }

    .img-text{
        float:left;
        width:81.5%;
        text-indent: 2em;
    }
    .text{
        text-indent: 2em;
    }
     .content-edit{
         float:right;
         margin-top:-15px;
         margin-right:4px;
     }
    li {
        word-break: break-all;
        word-wrap: break-word;
    }
    .list-group-item{
     padding:5px 5px;
    }
.content{
    padding:10px 0;
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
            <a href="{{url('/article/add')}}"><span style=" font-size:24px;height:60px;width:40%;margin:0px auto;" type="button" class="btn btn-success btn-lg btn-block active">添加文章</span></a>
            </div>
        @endif
        <ul class="list-group ">
            @foreach ($posts as $post)
                <li class="list-group-item" style="border:none;">
                    <h2><a href="/article/{{ $post->id }}"><strong>{{ $post->title }}</strong></a></h2>
                    <em><small>发布于：{{ $post->published_at }}</small></em>

                    <div class="content clearfix">
                        @if($post->thumb)
                            <div class="img-img">
                                <img src=" {{ $post->thumb }}">
                            </div>
                            <div class="img-text">{!!str_limit(nl2br(strip_tags($post->content)),500)!!}</div>
                            @else
                            <div class="text">{!!str_limit(nl2br(strip_tags($post->content)),500)!!}</div>
                        @endif

                        <br>
                    </div>
                    @if(Session::has('user'))

                        <div class="content-edit clearfix"><a  href="{{url('/article/'.$post->id.'/edit')}}">[编辑]</a><a  href="#">&nbsp;[删除]</a></div>
                    @endif
                </li>
            @endforeach
        </ul>
        {!! $posts->render() !!}
    </div>
</div>
<div class="footer">@include('layouts.home_footer')</div>
@stop