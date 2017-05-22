<nav class="navbar navbar-inverse">
    <div class=" col-md-10  col-sm-9 col-xs-8 container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">小窝博客</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" >
                <li class="active"><a href="{{url('/')}}">首页</a></li>
                <li><a href="{{url('/article/')}}">文章</a></li>
                <li><a href="#contact">相册</a></li>
                <li><a href="#contact">音乐</a></li>
                <li><a href="#contact">联系我</a></li>
                @if(Session::has('user'))
                    <li >
                            <div style="background-color: transparent;"  class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img style="padding-right: 10px; height:35px" src="http://img.mukewang.com/58101c80000162fb01000100-100-100.jpg">
                            </div>
                            <ul class="dropdown-menu" >
                                <li><a href="{{url('/loginOut')}}">个人信息</a></li>
                                <li><a href="{{url('/loginOut')}}">登出</a></li>
                            </ul>
                    </li>
                @else
                    <li><a href="{{url('/login')}}">登陆</a></li>
                    <li><a href="{{url('/regist')}}">注册</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
    <div class="pull-right" style="line-height:50px;">
        <ul class="nav navbar-nav">

        </ul>
    </div>
</nav>


