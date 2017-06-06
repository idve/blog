@extends('layouts.home_layout')
        @section('head-title'){{config('blog.title')}}@stop
@section('main')

        <!-- header -->
<div class="header">@include('layouts.home_header')</div>
<div class="main">
    <div class="row clearfix">
        <div class="col-md-4 column">
            <div class="page-header">
                <h1>推荐文章<small>&nbsp;&nbsp;推荐</small></h1>
            </div>
            <div >
                <div class="blog-post">

                    <div id="demo" style="overflow:hidden;height:300px;">
                        <div id="demo1">
                            <h2>@if(isset($data['position'])){{$data['position']->title}}@endif</h2>
                            <br>
                            @if(isset($data['position'])){!!$data['position']->content!!}@else无数据@endif
                        </div>
                        <div id="demo2"></div>
                    </div>
                    <script>
                        var speed=70;
                        demo2.innerHTML=demo1.innerHTML;
                        function Marquee(){
                            if(demo2.offsetTop-demo.scrollTop<=0)
                                demo.scrollTop-=demo1.offsetHeight;
                            else{
                                demo.scrollTop++
                            }
                        }
                        var MyMar=setInterval(Marquee,speed);
                        demo.onmouseover=function() { clearInterval(MyMar)};
                        demo.onmouseout=function() { MyMar=setInterval(Marquee,speed)};
                    </script>
                    <a href="@if(isset($data['position'])){{url("/article/{$data['position']->id}")}}@endif" style="margin-top:5px;" class="btn btn-default btn-lg ">查看<i class="fa fa-angle-right"></i></a>
                </div>
                <br>
            </div>


        </div>
        <div class="col-md-4 column">
            <div class="page-header">
                <h1>相册<small>&nbsp;&nbsp;推荐</small></h1>
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
                <h1>音乐<small>&nbsp;&nbsp;推荐</small></h1>
            </div>
            <div class="row">
            </div>



        </div>
    </div>

    <div class="row" style="padding-bottom: 15px;">
        <div class="page-header">
            <h1>热点文章<small>&nbsp;&nbsp;推荐</small></h1>
        </div>
      @foreach($data['hots'] as $hot)
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
            <div class="tm-content-box zg-box">
                <img src="{{$hot->thumb}}" alt="Image" class="tm-margin-b-20 img-fluid">
                <h4 class="tm-margin-b-20 tm-gold-text">{{$hot->title}}</h4>
                <p class="tm-margin-b-20">{!!str_limit(strip_tags($hot->content),150)!!}</p>
                <a href="/article/{{ $hot->id }}" class="zg-btn tm-btn text-uppercase">查看</a>
            </div>

        </div>
        @endforeach

    </div>
</div>

<div class="footer">@include('layouts.home_footer')</div>
@stop