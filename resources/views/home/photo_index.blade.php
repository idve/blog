@extends('layouts.home_layout')
        @section('head-title'){{config('blog.title')}}@stop
@section('script')
@stop
@section('main')
        <!-- header -->
<div class="header">@include('layouts.home_header')</div>
<div class="main">
    <div class="container">

        <div class="row clearfix">
            <div class="page-header">
                <h1>相册<small>&nbsp;&nbsp;推荐</small></h1>
            </div>
            <div class="col-lg-offset-1 col-md-9 column zg-photo">
                <div class="carousel slide" id="carousel-160617">
                    <ol class="carousel-indicators">
                        <li data-slide-to="0" data-target="#carousel-160617" class="active">
                        </li>
                        <li data-slide-to="1" data-target="#carousel-160617" >
                        </li>
                        <li data-slide-to="2" data-target="#carousel-160617" >
                        </li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item">
                            <img alt="" src="{{asset('images/1.jpg')}}" />
                            <div class="carousel-caption">
                                <h4>
                                    First Thumbnail label
                                </h4>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="" src="{{asset('images/2.jpg')}}" />
                            <div class="carousel-caption">
                                <h4>
                                    Second Thumbnail label
                                </h4>
                            </div>
                        </div>
                        <div class="item active">
                            <img alt="" src="{{asset('images/3.jpg')}}" />
                            <div class="carousel-caption">
                                <h4>
                                    Third Thumbnail label
                                </h4>
                            </div>
                        </div>
                    </div> <a class="left carousel-control" href="#carousel-160617" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-160617" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
        </div>






    </div>
</div>
<div class="footer">@include('layouts.home_footer')</div>
@stop