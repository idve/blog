@extends('layouts.home_layout')
@section('head-title')文章@stop
@section('main')
        <!-- header -->
<div class="header">@include('layouts.home_header')</div>
<div class="main">

    <div class="container">
        <h1>{{ $posts->title }}</h1>
        <h5>{{ $posts->published_at }}</h5>
        <hr>
        <div class="content" style="  word-break: break-all; word-wrap: break-word;">
            {!!$posts->content!!}
        </div>
        <button class="btn btn-primary" onclick="history.go(-1)">
            « 返回
        </button>
    </div>


</div>
<div class="footer">@include('layouts.home_footer')</div>
@stop