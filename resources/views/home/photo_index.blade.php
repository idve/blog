@extends('layouts.home_layout')
        @section('head-title'){{config('blog.title')}}@stop
@section('script')
    {{--图片上传--}}
    <script>

    </script>



@stop
@section('main')
        <!-- header -->
<div class="header">@include('layouts.home_header')</div>
<div class="main">
    <div class="container" >

        <div class="row clearfix zg-photo">
            <div class="page-header zg-photo-header">
                <h1 class="column col-sm-offset-0 col-sm-5">相册
                    <select id="cidbtn" class="zg-select-photo ">
                            <option @if($photo->cid_top==0) selected @endif value="0" >青春纪念册</option>
                            <option @if($photo->cid_top==1) selected @endif value="1" >岁月相机</option>
                            <option @if($photo->cid_top==2) selected @endif value="2">欢乐时光</option>
                        </select>

                    <script>
                        $(function(){
                           $("#cidbtn").change(function(){
                               var cid=$(this).val();
                               window.location.href=cid;
                           })
                        });
                    </script>

                    @if(Session::has('user'))
                        <button class="zg-cate-photo" data-toggle="modal" data-target="#upload_photo">上传照片</button>

                    @endif
                </h1>
            </div>
            <div class="col-lg-offset-2 col-md-8 column ">
                <div class="carousel slide" id="carousel-1">
                    <ol class="carousel-indicators">

                        @foreach($photo as $k=>$p)
                            @if($k==0)
                        <li data-slide-to="{{$k}}" data-target="#carousel-1" class="active"></li>
                            @else
                        <li data-slide-to="{{$k}}" data-target="#carousel-1" ></li>
                            @endif
                            @endforeach
                    </ol>
                    <div class="carousel-inner ">
                        @foreach($photo as $k=>$p)
                            @if($k==0)
                        <div class="item active" >
                            @else
                                <div class="item" >
                                    @endif
                            <img alt="" style="height:500px;width:750px;" src="{{$p->position}}" />
                            <div class="carousel-caption">
                                <h4  style="color:#928aff;font-weight:400;font-size:26px;">
                                    @if(!$p->msg)
                                        <input type="text"  @if(Session::has('user')) id="img-btn{{$p->id}}" onblur="storemsg({{$p->id}})" ondblclick="modifymsg({{$p->id}})"   placeholder="点击这里添加描述" @endif class="img-msg" readonly="true">
                                        @else
                                        <input type="text"  @if(Session::has('user'))   id="img-btn{{$p->id}}" onblur="storemsg({{$p->id}})" ondblclick="modifymsg({{$p->id}})" @endif class="img-msg" readonly="true" value="{{$p->msg}}">
                                    @endif
                                </h4>
                            </div>
                        </div>
                            @endforeach
                    </div> @if(!empty($photo[0]))<a class="left carousel-control" href="#carousel-1" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-1" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>@endif
                </div>
            </div>
        </div>
              <script>
                    var modifymsg=function(id) {
                        $("#img-btn"+id).removeAttr("readonly");
                    };
                    var storemsg=function(id){
                        $("#img-btn"+id).attr("readonly",'true');
                        $.ajax({
                            type: "POST",
                            url:"{{url('/photo/update')}}/"+id,
                            data: {
                                "_token":"{{csrf_token()}}",
                                'msg':$("#img-btn"+id).val()
                            },// 你的formid
                            async: false,
                            success: function(data) {
                                console.log(data);
                            }
                        });
                    }
              </script>

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
                        <form id="photoform" enctype="multipart/form-data"  method="post" action="{{url('/photo/upload')}}">
                            <div class="form-group zg-up">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label for="upload-photo" class="control-label">选择相片：</label>
                                <input type="file" multiple="multiple" class="" name="photo[]" id="upload-photo">
                            </div>
                            <div>
                                <label for="recipient-name" class="control-label">选择分类：</label>
                                <select class="zg-select-photo" name="cid">
                                    <option value="0" selected>青春纪念册</option>
                                    <option value="1">岁月相机</option>
                                    <option value="2">欢乐时光</option>
                                </select>
                            </div>
                        </form>
                        <div id="pp"></div>
                    </div>
                    <script>
                        //添加一张相片就显示一张相片
                        $(document).ready(function () {
                            $("#upload-photo").change(function () {
                                $('#pp').html("");
                                var fil = this.files;
                                for (var i = 0; i < fil.length; i++) {
                                    reads(fil[i]);
                                }
                            });
                        });
                        function reads(fil){
                            var reader = new FileReader();
                            reader.readAsDataURL(fil);
                            reader.onload = function()
                            {
                                $('#pp').append("<img style='width:100px;padding:5px 5px;' src='"+reader.result+"'>");
                            };
                        }
                    </script>
                    <div class="modal-footer zg-up-foot">
                        <button type="button" id="input-photo"  class="btn btn-primary">保存</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    </div>
                    <script>
                            $(function(){
                               $("#input-photo").click(function(){
                                 $("#photoform").submit();
                               });
                            });
                    </script>
                </div>
            </div>
        </div>

<div class="footer">@include('layouts.home_footer')</div>
@stop