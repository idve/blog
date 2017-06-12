@extends('layouts.home_layout')
@section('head-title'){{config('blog.title')}}@stop
@section('scripts')
    @stop
@section('style')

@stop
@section('main')

    <!-- header -->
    <div class="header">@include('layouts.home_header')</div>
    <div class="main">
        <div class="row clearfix">
            <div class="col-md-4 column">
                <div class="page-header">
                    <h1>推荐文章
                        <small>&nbsp;&nbsp;推荐</small>
                    </h1>
                </div>
                <div>
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
                            var speed = 70;
                            demo2.innerHTML = demo1.innerHTML;
                            function Marquee() {
                                if (demo2.offsetTop - demo.scrollTop <= 0)
                                    demo.scrollTop -= demo1.offsetHeight;
                                else {
                                    demo.scrollTop++
                                }
                            }
                            var MyMar = setInterval(Marquee, speed);
                            demo.onmouseover = function () {
                                clearInterval(MyMar)
                            };
                            demo.onmouseout = function () {
                                MyMar = setInterval(Marquee, speed)
                            };
                        </script>
                        <a href="@if(isset($data['position'])){{url("/article/{$data['position']->id}")}}@endif"
                           style="margin-top:5px;" class="btn btn-default btn-lg ">查看<i
                                    class="fa fa-angle-right"></i></a>
                    </div>
                    <br>
                </div>


            </div>
            <div class="col-md-4 column">
                <div class="page-header">
                    <h1>相册
                        <small>&nbsp;&nbsp;推荐</small>
                    </h1>
                </div>
                <div class="carousel slide" id="carousel-160617">
                    <ol class="carousel-indicators">
                        @foreach($data['photo'] as $k=>$p)

                            @if($k==0)
                                <li data-slide-to="{{$k}}" data-target="#carousel-2" class="active"></li>
                            @else
                                <li data-slide-to="{{$k}}" data-target="#carousel-2"></li>
                            @endif
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($data['photo'] as $k=>$p)
                            @if($p->id==22)
                                <div class="item active">
                                    @else
                                        <div class="item ">
                                            @endif
                                            <img alt="" style="height:310px;width:420px;" src="{{$p->position}}"/>
                                            <div class="carousel-caption">
                                                <h4>
                                                    <input type="text" class="img-msg" readonly="true"
                                                           value="{{$p->msg}}">
                                                </h4>
                                            </div>
                                        </div>
                                        @endforeach
                                </div> <a class="left carousel-control" href="#carousel-2" data-slide="prev"><span
                                            class="glyphicon glyphicon-chevron-left"></span></a> <a
                                        class="right carousel-control" href="#carousel-160617" data-slide="next"><span
                                            class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>

                <div class="col-md-4 column">
                    <div class="page-header">
                        <h1>音乐
                            <small>&nbsp;&nbsp;推荐</small>
                        </h1>
                    </div>



                </div>
            </div>

            <div class="row" style="padding-bottom: 15px;">
                <div class="page-header">
                    <h1>热点文章
                        <small>&nbsp;&nbsp;推荐</small>
                    </h1>
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