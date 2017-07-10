<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/homes/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/homes/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
		<style type="text/css">
			.span{
				height: 20px;
				display: block;
			}
			.login-box{
				height: 445px;

			}
		</style>
	</head>
	<body>

		<div class="login-boxtitle" >
			<a href="home/demo.html"><img alt="" src="/homes/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg">
					<img src="/homes/images/big.jpg" />
				</div>
		<div class="login-box" >
             
		<div class="am-tabs" id="doc-my-tabs" >
			<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify" style="margin-bottom:-20px;">
				<li>欢迎注册</li>
			</ul>
			<form method="post" action="/user/insert" enctype="multipart/form-data">
				
                <div class="user-pass" >
				    <label for="uname"><i class="am-icon-user am-icon-fw"></i></label>
				    <input value="{{old('uname')}}"  type="text" name="uname" id="uname" placeholder="用户名">
                </div>
                <span class='span'>
                	@if($errors ->has('uname'))
						<font style="color:red">用户为空或格式不正确</font>
					@elseif(session('uname'))
						<font style="color:red">{{session('uname')}}</font>
					@endif
				</span>
                <div class="user-pass">
				    <label for="password"><i class="am-icon-lock"></i></label>
				    <input type="password" name="upwd" id="password" placeholder="设置密码">
                </div>	
                <span class='span'>
                	@if($errors ->has('upwd'))
						<font style="color:red">密码为空或格式不正确</font>
					@endif
                </span>								
                <div class="user-pass">
				    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
				    <input type="password" name="reupwd" id="passwordRepeat" placeholder="确认密码">
                </div>
                <span class='span'>
                	@if($errors ->has('upwd'))
						<font style="color:red">确认密码为空或不一致</font>
					@endif
                </span>
                <div class="user-phone">
				    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
				    <input type="tel" value="{{old('phone')}}" name="phone" id="phone" placeholder="请输入手机号">
                </div>
                <span class='span'>
                	@if($errors ->has('phone'))
						<font style="color:red">手机号不能为空</font>
					@elseif(session('phone'))
						<font style="color:red">{{session('phone')}}</font>
					@endif
                </span>									
				<div class="verification">
					<label for="code"><i class="am-icon-code-fork"></i></label>
					<input type="tel" name="phone_code" id="code" placeholder="请输入验证码">
					<a class="btn" href="javascript:void(0);" >
					<span id="dyMobileButton">获取</span></a>
				</div>
				<span class='span'>
					@if(session('error'))
						<font style="color:red">{{ session('error') }}</font>
					@endif
				</span>
				{{csrf_field()}}
                <div class="am-cf">
					<input type="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
				</div>
			</form>
		</div>
<script type="text/javascript">
	$(function()
	{	
		$('#doc-my-tabs').tabs();

		var s1 = s2 = s3 = false;
		//获取用户
		var uname = $('input[name="uname"]');
		//用户聚焦
		uname.focus(function(){
			$('span:eq('+$('input').index(this)+')').text('请输入6-18位 字母数字下划线').css('color','#ccc');
		});

		//失去焦点
		uname.blur(function()
		{
			//正则验证
			var preg = /^[0-9a-zA-Z_]{6,18}$/;
			//判断验证结果
			if(preg.test(uname.val())){
				$('.span:eq('+$('input').index(this)+')').text('用户可用' ).css('color','blue');
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
				$(this).keyup(function(){
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
				$('.span:eq('+$('input').index(this)+')').text('密码安全').css('color','blue');
				s2 = true;
			}
		});

		//获取确认密码
		var reupwd = $('input[name="reupwd"]');

		//聚焦
		reupwd.focus(function()
			{
				$('.span:eq('+$('input').index(this)+')').text('请再输入一遍').css('color','#ccc');
			});
		//失焦
		reupwd.blur(function()
			{
				if(upwd.val() == reupwd.val()){
					$('.span:eq('+$('input').index(this)+')').text('').css('color','#ccc');
					s2 = true;
				}else{
					$('.span:eq('+$('input').index(this)+')').text('密码不一致').css('color','red');
					s2 = false;
				}
			});

		//手机号
		var tel = $('input[name="phone"');
		//用户聚焦
		tel.focus(function()
		{
			$('.span:eq('+$('input').index(this)+')').text('请输11位手机号').css('color','#ccc');
		});

		//失去焦点
		tel.blur(function()
		{
			//正则验证
			var preg = /^1[3,4,5,7,8]\d{9}$/;
			//判断验证结果
			if(preg.test(tel.val())){
				$('.span:eq('+$('input').index(this)+')').text('' ).css('color','blue');
				s3 = true;
			}else{
				$('.span:eq('+$('input').index(this)+')').text('手机号为空或格式不正确').css('color','red');
				s3 = false;
			}
		});	
		//获取验证码
		$('#dyMobileButton').click(function()
		{
			var phone = $('#phone').val();

			// 发送ajax 注册手机号
			$.get('/user/phone',{phone:phone},function(msg)
			{
				if(msg.code == 2){
						alert(msg.msg);
						return;
					}else{
						alert(msg.msg);
						return;
					}
			},'json');
		});

		//提交form
		$('form').submit(function()
		{	
			if(s1 && s2 && s3 ){
				return true;
			}
			return false;
		});
	});
</script>

			</div>
			</div>

			</div>
			</div>
			
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