<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="/admins/img/favicon.html">

    <title>{{Config::get('app.title')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="/admins/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admins/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/admins/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/admins/css/style.css" rel="stylesheet">
    <link href="/admins/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script href="/admins/js/html5shiv.js"></script>
    <script href="/admins/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="{{url('admin/login/dologin')}}" method="post">
        {{csrf_field()}}
        @if(session('error'))
             <h2 class="form-signin-heading">{{session('error')}}</h2>
        @else
             <h2 class="form-signin-heading">后台登录</h2>
        @endif
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="用户名" autofocus name="uname" value="{{old('uname')}}"/>
            <input type="password" class="form-control" placeholder="密码" name="upwd" />
            <input type="text" class="form-control" placeholder="验证码" name="code" />
            <span >验证码:</span><img src="{{url('code')}}" alt="加载中.." title="点击切换" style="margin-left:10px;margin-bottom:10px;" onclick="this.src='{{url('/code')}}?'+Math.random()">
            <span class="pull-right"> <a href="{{url('admin/login/forgetpwd')}}"> 忘记密码 ?</a></span>

            <button class="btn btn-lg btn-login btn-block" type="submit">登 录</button>
            {{--<div class="login-social-link">--}}
                {{--<a href="index.html" class="facebook">--}}
                    {{--<i class="icon-facebook"></i>--}}
                    {{--Facebook--}}
                {{--</a>--}}
                {{--<a href="index.html" class="twitter">--}}
                    {{--<i class="icon-twitter"></i>--}}
                    {{--Twitter--}}
                {{--</a>--}}
            {{--</div>--}}

        </div>

    </form>

</div>


</body>
</html>
