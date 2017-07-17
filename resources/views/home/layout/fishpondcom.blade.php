<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>我的鱼塘</title>

    <link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

    <link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/infstyle.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/homes/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/homes/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>



</head>

<body>
@include('home.layout.header')
<div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
    <div class="nav-cont">
        <ul>
            <li class="index"><a href="{{url('/')}}">首页</a></li>
            <li class="qc"><a href="/homes/#">闪购</a></li>
            <li class="qc"><a href="/homes/#">限时抢</a></li>
            <li class="qc"><a href="/homes/#">团购</a></li>
            <li class="qc last"><a href="/homes/#">大包装</a></li>
        </ul>
        <div class="nav-extra">
            <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
            <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
        </div>
    </div>
</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
@section('content')

@show
<!--底部-->
    @include('home.layout.footer')
    </div>
    <aside class="menu">
        <ul>
            <li class="person">
                <a href="/homes/index.html">鱼塘中心</a>
            </li>
            <li class="person">
                <a href="javascript:;">鱼塘信息</a>
                <ul>
                    <li class="active"> <a href="{{url('/myfishpond/list')}}">鱼塘列表</a></li>
                    <li> <a href="{{url('/myfishpond/add')}}">添加鱼塘</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>
</body>
</html>