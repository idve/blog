@extends('layouts.home_layout')
        @section('head-title'){{config('blog.title')}}@stop
@section('main')
        <!-- header -->
<div class="header">@include('layouts.home_header')</div>
<div class="main">
    <div class="row clearfix">
        <div class="col-md-4 column">
            <div class="page-header">
                <h1>推荐文章<small>&nbsp;&nbsp;列表</small></h1>
            </div>
            <div class="col-md-8 ">
                <div class="blog-post">
                    <h2>laravel是个非常强大的框架</h2>
                    <h4>发布：<a href="#">曾刚</a>&nbsp;&nbsp;on 24th January 2015 </h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                        Curabitur nec nisl odio. Mauris vehicula at nunc id posuere.
                    </p>
                    <a href="#" class="btn btn-default btn-lg ">Read More <i class="fa fa-angle-right"></i></a>
                </div>
                <br>

            </div>
        </div>
        <div class="col-md-4 column">
            <div class="page-header">
                <h1>相册<small>&nbsp;&nbsp;列表</small></h1>
            </div>
            <div class="carousel slide" id="carousel-160617">
                <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#carousel-160617">
                    </li>
                    <li data-slide-to="1" datda-target="#carousel-160617">
                    </li>
                    <li data-slide-to="2" data-target="#carousel-160617" class="active">
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <img alt="" src="{{asset('images/1.jpg')}}" />
                        <div class="carousel-caption">
                            <h4>
                                First Thumbnail label
                            </h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img alt="" src="{{asset('images/2.jpg')}}" />
                        <div class="carousel-caption">
                            <h4>
                                Second Thumbnail label
                            </h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                    <div class="item active">
                        <img alt="" src="{{asset('images/3.jpg')}}" />
                        <div class="carousel-caption">
                            <h4>
                                Third Thumbnail label
                            </h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div> <a class="left carousel-control" href="#carousel-160617" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-160617" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <div class="col-md-4 column">
            <div class="page-header">
                <h1>音乐<small>&nbsp;&nbsp;列表</small></h1>
            </div>
            <div class="row">


            </div>



        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

            <div class="tm-content-box">
                <img src="{{asset('images/1.jpg')}}" alt="Image" class="tm-margin-b-20 img-fluid">
                <h4 class="tm-margin-b-20 tm-gold-text">Lorem ipsum dolor #1</h4>
                <p class="tm-margin-b-20">Aenean cursus tellus mauris, quis
                    consequat mauris dapibus id. Donec
                    scelerisque porttitor pharetra</p>
                <a href="#" class="tm-btn text-uppercase">Detail</a>
            </div>

        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

            <div class="tm-content-box">
                <img src="{{asset('images/2.jpg')}}" alt="Image" class="tm-margin-b-20 img-fluid">
                <h4 class="tm-margin-b-20 tm-gold-text">Lorem ipsum dolor #2</h4>
                <p class="tm-margin-b-20">Aenean cursus tellus mauris, quis
                    consequat mauris dapibus id. Donec
                    scelerisque porttitor pharetra</p>
                <a href="#" class="tm-btn text-uppercase">Read More</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

            <div class="tm-content-box">
                <img src="{{asset('images/2.jpg')}}" alt="Image" class="tm-margin-b-20 img-fluid">
                <h4 class="tm-margin-b-20 tm-gold-text">Lorem ipsum dolor #2</h4>
                <p class="tm-margin-b-20">Aenean cursus tellus mauris, quis
                    consequat mauris dapibus id. Donec
                    scelerisque porttitor pharetra</p>
                <a href="#" class="tm-btn text-uppercase">Read More</a>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

            <div class="tm-content-box">
                <img src="{{asset('images/2.jpg')}}" alt="Image" class="tm-margin-b-20 img-fluid">
                <h4 class="tm-margin-b-20 tm-gold-text">Lorem ipsum dolor #2</h4>
                <p class="tm-margin-b-20">Aenean cursus tellus mauris, quis
                    consequat mauris dapibus id. Donec
                    scelerisque porttitor pharetra</p>
                <a href="#" class="tm-btn text-uppercase">Read More</a>
            </div>
        </div>

    </div>
    <div>
        <nav class="navbar" style="text-align: center">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="footer">@include('layouts.home_footer')</div>
@stop