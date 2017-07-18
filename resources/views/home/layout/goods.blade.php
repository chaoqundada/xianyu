<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>个人资料</title>

    <link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/infstyle.css" rel="stylesheet" type="text/css">
    <link href="{{url('homes/css/addstyle.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/homes/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link href="/homes/css/report.css" rel="stylesheet" type="text/css">
  <!--   <link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
    <link type="text/css" href="/homes/css/optstyle.css" rel="stylesheet" />
    <link type="text/css" href="/homes/css/style.css" rel="stylesheet" /> -->


    <script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>  
    <script src="/homes/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
    <script language="javascript" src="{{url('homes/js/PCASClass.js')}}"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
</head>

<body>
@include('home.layout.header')
<div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
    <div class="nav-cont">
        @include('home.layout.nav')
        <div class="nav-extra">
            <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
            <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
        </div>
    </div>
</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">
    <!-- 内容开始 -->
    @section('content')

    @show
    <!-- 内容结束 -->
        </div>
        <!--底部-->
        @include('home.layout.footer')
    </div>

    <aside class="menu">
        <ul>
            <li class="person">
                <a href="{{url('goods/add')}}">发布闲置</a>
            </li>
            <li class="person">
                <a href="{{url('goods/index')}}">我发布的</a>
            </li>
            <li class="person">
                <a href="{{url('goods/out')}}">我卖出的</a>
            </li>
            <li class="person">
                <a href="{{url('goods/service')}}">退款管理</a>
            </li>
            <li class="person">
                <a href="{{url('goods/add')}}">我的拍卖</a>
            </li>
        </ul>
    </aside>
</div>
</body>
</html>