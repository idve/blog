<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>@yield('head-title')</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>小窝博客</title>
    <!-- 引入bootstrap -->
    <link href="{{asset("bootstrap3/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/zg.css")}}" rel="stylesheet" type="text/css">
    <!-- Styles -->
    @yield('style')
    <!-- JS -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap3/js/bootstrap.min.js')}}"></script>
    @yield('scripts')

</head>
<body>
@yield('main')
</body>
</html>
