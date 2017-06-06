@extends('layouts.home_layout')
@section('head-title')文章@stop
@section('main')
        <!-- header -->
<div class="header">@include('layouts.home_header')</div>
<div class="main">

    <div class="container">
        <div class="article-search">
            @if(Session::has('user'))
                <a  href="{{url('/article/add')}}">添加文章</a>
            @endif
            <select >
                <option value="-1" >所有文章</option>
                <option value="0" >未分类</option>
                @foreach(\App\Cate::all() as $cate)
                    <option value="{{$cate->id}}">{{$cate->cname}}</option>
                @endforeach
            </select>
        </div>
        <h1>文章<small>&nbsp;&nbsp;列表</small>
        </h1>
        <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>


        <ul class="list-group ">
            @foreach ($posts as $post)
                <li class="list-group-item" style="border:none;">
                    <h2><a href="/article/{{ $post->id }}"><strong>{{ $post->title }}</strong></a></h2>
                    <em><small style="color:#88ff59">类别：<span style="color: #ffbe1e">{{ $post->cate['cname'] }}</span></small>
                        <small style="float:right;color:#ff87f5">发布于：{{ $post->published_at }}</small>
                    </em>

                    <div class="content clearfix">
                        @if($post->thumb)
                            <div class="img-img">
                                <img src=" {{ $post->thumb }}">
                            </div>
                            <div class="img-text">{{str_limit(nl2br(strip_tags($post->content)),500)}}</div>
                            @else
                            <div class="text">{{str_limit(nl2br(strip_tags($post->content)),500)}}</div>
                        @endif

                        <br>
                    </div>
                    @if(Session::has('user'))
                        <div class="content-edit clearfix"><a  href="{{url('/article/'.$post->id.'/edit')}}">[编辑]</a><a  href="{{url('/article/'.$post->id.'/delete')}}">&nbsp;[删除]</a></div>
                    @endif
                </li>
            @endforeach
        </ul>
        {!! $posts->render() !!}
    </div>
</div>
<div class="footer">@include('layouts.home_footer')</div>
@stop