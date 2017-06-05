@extends('layouts.home_layout')
        @section('head-title'){{config('blog.title')}}@stop
@section('main')

        <!-- header -->
<div class="header">@include('layouts.home_header')</div>
<div class="main">

</div>
<div class="footer">@include('layouts.home_footer')</div>
@stop