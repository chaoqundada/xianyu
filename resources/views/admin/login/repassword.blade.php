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
    <link href="{{asset('/admins/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admins/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('/admins/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('/admins/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/admins/css/style-responsive.css')}}" rel="stylesheet" />
    <script src="{{asset('/admins/js/jquery-1.8.3.min.js')}}" ></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script href="/admins/js/html5shiv.js"></script>
    
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="{{url('admin/login/reupwd')}}/{{$uid}}" method="post">
        {{csrf_field()}}
        @if(session('error'))
             <h2 class="form-signin-heading">{{session('error')}}</h2>
        @else
             <h2 class="form-signin-heading">更改密码</h2>
        @endif
        <div class="login-wrap">
            <input type="password" class="form-control" placeholder="密码" name="upwd" id="pass" /><span id="forpass"></span>
            <input type="password" class="form-control" placeholder="确认密码" name="reupwd" id="repass"/><span id="forrepass"></span>
            <input type="text" class="form-control" placeholder="验证码" name="code" />
            <span >验证码:</span><img src="{{url('code')}}" alt="加载中.." title="点击切换" style="margin-left:10px;margin-bottom:10px;" onclick="this.src='{{url('/code')}}?'+Math.random()">
            <button class="btn btn-lg btn-login btn-block" type="submit">提 交</button>
            

        </div>

    </form>

</div>
<script type="text/javascript">
//验证密码

        var preg_pass = /^[a-zA-Z0-9]\w{5,17}$/;
        $('#pass').blur(function(){

            if(preg_pass.test($(this).val()))
            {
                $('#forpass').html('<font style="color:green;font-size:17px;"><i class="icon-check-sign"></i>密码可用</font>');
            }else
            {
                $('#forpass').html('<font style="color:red;font-size:17px;"><i class="icon-remove"></i>密码格式不正确</font>');
            }
        }).focus(function(){
            $('#forpass').html('');
        });
    //确认密码
        $('#repass').blur(function(){

            if($(this).val().length == 0)
            {
                $('#forrepass').html('<font style="color:red;font-size:17px;"><i class="icon-remove"></i>确认密码不正确</font>');
                return;
            }
            if($(this).val()!==$('#pass').val())
            {
                $('#forrepass').html('<font style="color:red;font-size:17px;"><i class="icon-remove"></i>确认密码不正确</font>');
                return;
            }
            else
            {

                $('#forrepass').html('<font style="color:green;font-size:17px;"><i class="icon-check-sign"></i>确认密码正确</font>');
            }
        }).focus(function(){
            $('#forrepass').html('');
        });


</script>
</body>
</html>
