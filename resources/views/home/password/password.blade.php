<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>密码修改成功</title>
    <link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/infstyle.css" rel="stylesheet" type="text/css">
    <link href="{{url('homes/css/addstyle.css')}}" rel="stylesheet" type="text/css">

    <script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
    <script language="javascript" src="{{url('homes/js/PCASClass.js')}}"></script>
    <script language="javascript" src="{{url('layer/layer.js')}}"></script>
    <link href="{{url('homes/css/stepstyle.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
	#div{
		margin:0px auto;
		width:1000px;
		height:300px;
		background: #fff;
	}
</style>
</head>
<body>

<header>
<article>
	<div class="mt-logo">
		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					<div class="menu-hd">
						@if(session('user'))
                            <span class="h">欢迎:{{session('user')['uname']}}登录</span>
                            <a href="{{url('login/outlogin')}}" target="_top">退出</a>
                        @else
                            <a href="{{url('login/login')}}" target="_top" class="h">亲，请登录</a>
                            <a href="{{url('user/add')}}" target="_top">免费注册</a>
                        @endif
					</div>
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd">
						<a href="/" target="_top" class="h">商城首页</a>
					</div>
				</div>				
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	
</article>
</header>

<div id="div">
		<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf">
			<strong class="am-text-danger am-text-lg">{{$status}}</strong>
		</div>
	</div>
	<hr>
	<h1 style='font-size:18px;margin-left:40px;'>点击<a href="{{$url}}" style="color:#F60;margin-left:10px;">{{$addr}}</a></h1>
</div>
</div>
</body>
</html>