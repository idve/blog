@extends('layouts.home_layout')
        @section('head-title'){{config('blog.title')}}@stop
@section('script')
@stop
@section('main')
        <!-- header -->
<div class="header">@include('layouts.home_header')</div>
<div class="main">
    <div class="container" >

        <div class="row clearfix zg-photo">
            <div class="page-header zg-photo-header">
                <h1 class="column col-sm-offset-0 col-sm-5">相册
                    <select class="zg-select-photo ">
                            <option value="0">青春纪念册</option>
                            <option value="0">岁月相机</option>
                            <option value="0">欢乐时光</option>
                        </select>
                    @if(Session::has('user'))
                        <button class="zg-cate-photo" data-toggle="modal" data-target="#upload_photo">上传照片</button>

                    @endif
                </h1>
            </div>
            <div class="col-lg-offset-2 col-md-8 column ">
                <div class="carousel slide" id="carousel-1">
                    <ol class="carousel-indicators">
                        <li data-slide-to="0" data-target="#carousel-1" class="active"></li>
                        <li data-slide-to="1" data-target="#carousel-1" ></li>
                        <li data-slide-to="2" data-target="#carousel-1" ></li>
                        <li data-slide-to="3" data-target="#carousel-1" ></li>
                    </ol>
                    <div class="carousel-inner ">
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
                        <div class="item">
                            <img alt="" src="{{asset('images/4.jpg')}}" />
                            <div class="carousel-caption">
                                <h4>
                                    ssss Thumbnail label
                                </h4>
                            </div>
                        </div>
                    </div> <a class="left carousel-control" href="#carousel-1" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-1" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
        </div>


    </div>
</div>
       {{--模态框--}}
        <div class="modal fade" id="upload_photo" tabindex="-1" role="dialog" aria-labelledby="ecreateCateLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="ecreateCateLabel">创建分类</h4>
                    </div>
                    <div class=""><span id="msg-addCate" class=""></span></div>
                    <div class="modal-body">
                        <form id="cateform">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label for="recipient-name" class="control-label">选择相片：</label>
                                <input type="file" multiple="multiple" class="form-control" name="cname" id="cate-name">
                                <label for="recipient-name" class="control-label">选择分类：</label>
                            </div>
                            <div>

                            </div>





                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="input-cate"  class="btn btn-primary">保存</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    </div>
                </div>
            </div>
        </div>

<div class="footer">@include('layouts.home_footer')</div>
@stop