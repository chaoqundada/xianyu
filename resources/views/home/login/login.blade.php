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
						<form method="post" action="{{url('login/dologin')}}" enctype="multipart/form-data">
						  	<div class="user-name">
							    <label for="user"><i class="am-icon-user"></i></label>
							    <input  type="text" name="uname" id="user" placeholder="用户名/手机号" value="{{ old('uname')}}">
				            </div>
				            <span class='span'>
			                
							</span>
				            <div class="user-pass" >
							    <label for="password"><i class="am-icon-lock"></i></label>
							    <input type="password" name="upwd" id="password" placeholder="请输入密码">
				            </div>
			          		<span class='span'>
			                	
							</span>
							{{csrf_field()}}
				          	<div class="am-cf" >
								<input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
							</div>
						</form>
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
<script type="text/javascript">
	$(function()
		{
			var s1 = s2 = false;
			//获取用户
			var uname = $('input[name="uname"]');
			//用户聚焦
			uname.focus(function(){
				$('.span:eq('+$('input').index(this)+')').text('请输入6-18位 字母数字下划线').css('color','#ccc');
			});

			//失去焦点
			uname.blur(function()
			{
				//正则验证
				var preg = /^[0-9a-zA-Z_]{6,18}$/;
				//判断验证结果
				if(preg.test(uname.val())){
					$('.span:eq('+$('input').index(this)+')').text('用户正确' ).css('color','blue');
					// $.get('/home/user/yanzheng',{uname:uname.val()},function(msg)
					// 	{
					// 		// alert(msg);
					// 		if(msg){
					// 			 $('.span:eq('+$('input').index(this)+')').text('用户可用' ).css('color','blue');
					// 		}
					// 	});
					s1 = true;
				}else{
					$('.span:eq('+$('input').index(this)+')').text('用户格式不正确').css('color','red');
					s1 = false;
				}
			});

			//获取密码
			var upwd = $('input[name="upwd"]');
			//聚焦
			upwd.focus(function()
				{
						$('.span:eq('+$('input').index(this)+')').text('请输入6-18位密码').css('color','#ccc');
						var li = $('li');
						$(this).keyup(function()
						{
								var arr = [];
								/*
									1.数字  
									2.小写字母
									3.大写字母
									4.特殊符号
								*/
								var preg1 = /[0-9]+/g;
								var preg2 = /[a-z]+/g;
								var preg3 = /[A-Z]+/g;
								var preg4 = /[\W_]+/g;
								if(preg1.test(upwd.val())){
									arr.push('数字');
								}
								if(preg2.test(upwd.val())){
									arr.push('小写字母');
								}
								if(preg3.test(upwd.val())){
									arr.push('大写字母');
								}
								if(preg4.test(upwd.val())){
									arr.push('特殊字符');
								}
						});
				});
				//失去焦点
				upwd.blur(function()
				{
					if(upwd.val().length < 6){
						$('.span:eq('+$('input').index(this)+')').text('密码不能为空').css('color','red');
						s2 = false;
					}else if(upwd.val().length>18){
						$('.span:eq('+$('input').index(this)+')').text('密码格式不正确').css('color','red');
						s2 = false;
					}else{
						$('.span:eq('+$('input').index(this)+')').text('密码正确').css('color','blue');
						s2 = true;
					}
				});
				//提交form
				$('form').submit(function()
				{	
					if(s1 && s2 ){
						return true;
					}
					return false;
				});

			});
</script>
		<div class="footer ">
			<div class="footer-hd ">
				<p>
					<a href="# ">恒望科技</a>
					<b>|</b>
					<a href="# ">商城首页</a>
					<b>|</b>
					<a href="# ">支付宝</a>
					<b>|</b>
					<a href="# ">物流</a>
				</p>
			</div>
			<div class="footer-bd ">
				<p>
					<a href="# ">关于恒望</a>
					<a href="# ">合作伙伴</a>
					<a href="# ">联系我们</a>
					<a href="# ">网站地图</a>
					<em>© 2015-2025 Hengwang.com 版权所有</em>
				</p>
			</div>
		</div>
	</body>
</html>