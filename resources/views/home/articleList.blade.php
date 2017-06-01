@extends('layouts.home_layout')
@section('head-title')文章@stop
@section('style')
 <style>
    .img-img{
        float:left;
        margin-right: 5px;
    }
    .img-img img{
        height:150px;
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
     .article-search
     {
         float:right;
         width:400px;
         padding:5px;
         text-align: right;
     }
    .article-search select{
        padding-left:5px;
        height:30px;
        font-size: 14px;
        line-height: 30px;
        border-radius: 5px;
        background-color: transparent;
        border:1px solid #0f74a8;
    }

    .article-search a{
              display: inline-block;
        padding:5px 0;
              width:150px;
               background-color: #ddb1ff;
              text-align: center;
              font-size:18px;
              margin: 0 25px;
              color:#5a57ff;
             font-weight:500;
             border-radius: 5px;
    }
    .article-search a:hover {
     background-color:rgba(221,177,255,0.7) ;


    }
 </style>
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
                            <div class="img-text">{!!str_limit(nl2br(strip_tags($post->content)),500)!!}</div>
                            @else
                            <div class="text">{!!str_limit(nl2br(strip_tags($post->content)),500)!!}</div>
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