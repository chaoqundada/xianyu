<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<script src="{{url('homes/AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script> 
		<link rel="stylesheet" href="{{url('homes/AmazeUI-2.4.2/assets/css/amazeui.css')}}" />
		<link href="{{url('homes/css/dlstyle.css')}}" rel="stylesheet" type="text/css">
		<style type="text/css">
			.span{
				height: 20px;
				display: block;
			}
		</style>
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="{{url('/')}}"><img src="{{config('dll.LOGO')}}" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="{{url('homes/images/big.jpg')}}" /></div>
				<div class="login-box">
					<font style="height:20px; display: block; color:red">
						@if(session('error'))
							{{session('error')}}
						@endif
					</font>
					<h3 class="title">登录商城</h3>
					<div class="clear"></div>
					<div class="login-form" style="background:#f8f8f8;">
						<form action="/login/dologin" method="post" id="denglu">
							<div class="user-name">
								<label for="user"><i class="am-icon-user"></i></label>
								<input type="text" name="user" id="user" placeholder="手机/用户名">
							</div>
							<div class="user-pass">
								<label for="password"><i class="am-icon-lock"></i></label>
								<input type="password" name="password" id="password" placeholder="请输入密码">
							</div>
							<div class="am-cf">
								{{csrf_field()}}
								<input id="denglu" type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
							</div>
						</form>
						<script>
                            $('#denglu').submit(function(){

                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: "/login/dologin",
                                    type:"post",
                                    data:{
                                        password:$('#password').val(),
                                        user:$('#user').val(),
                                        _token:'{{csrf_token()}}'
                                    },
                                    dataType:"json",
                                    success: function(msg){
                                        if(msg ==1){
                                            alert('你知道得太多了');
                                            location.href="{{url('/')}}";
                                        }else if(msg ==2){
                                            alert('密码错误');
                                        }else{
                                            alert('用户名不存在');
                                        }
                                    },
                                    error: function(errors) {
                                        var json=JSON.parse(errors.responseText);
                                        var str='';
                                        for (var i in json){
                                            str += json[i]+'  ';
                                        }
                                        alert(str);
                                        return false;
                                    },
                                });
                                return false;
                            });
						</script>
	        		</div>
	       			<div class="login-links">
	           			<label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
						<a href="{{url('pass/forget')}}" class="am-fr">忘记密码</a>
						<a href="{{url('user/add')}}" class="zcnext am-fr am-btn-default">注册</a>
						<br />
			        </div>
						
				</div>
			</div>
		</div>

		@include('home.layout.footer')
	</body>
</html>