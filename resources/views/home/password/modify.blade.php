@extends('home/layout/detil ')
@section('content')

<div class="am-cf am-padding">
	<div class="am-fl am-cf">
		<strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small>
	</div>
</div>
<hr/>
 <font style="display: block;height: 20px; font-size:19px; color:red; margin-left:500px;">
 	@if(session('error'))
 		{{session('error')}}
 	@endif
 </font>

<form  method="post" action="{{url('pass/domodify')}}" enctype="multipart/form-data" class="am-form am-form-horizontal">

	<div class="am-form-group">
		<label for="user-new-password" class="am-form-label">原密码</label>
		<div class="am-form-content">
			<input type="password" name='upwd'  id="user-new-password" placeholder="请输入原登录密码">
		</div>
		<span id='span1' style="margin-left:105px; color:red;">
			@if($errors -> has('upwd')) 原密码必填 @endif
		</span>
	</div>

	<div class="am-form-group">
		<label for="user-new-password" class="am-form-label">新密码</label>
		<div class="am-form-content">
			<input type="password" name='password' id="user-new-password" placeholder="输入新密码">
		</div>
		<span id='span2' style="margin-left:105px; color:red;">
			@if($errors -> has('password')) 新密码必填 @endif
		</span>
	</div>
	<div class="am-form-group">
		<label for="user-confirm-password" class="am-form-label">确认密码</label>
		<div class="am-form-content">
			<input type="password" name='repassword' id="user-confirm-password" placeholder="请再次输入上面的密码">
		</div>
		<span id='span3' style="margin-left:105px; color:red;">
			@if($errors -> has('repassword')) 密码不一致 @endif
		</span>
	</div>
	{{csrf_field()}}
	<div class="info-btn">
		<input  class="am-btn am-btn-danger" type="submit" value="保存修改">
	</div>
</form>
<script type="text/javascript">
	$(function()
		{
			var s1 = s2 = s3 = false;
			//获取原密码
			var upwd = $('input[name="upwd"]');
			//聚焦
			upwd.focus(function()
				{
					$('#span1').text('请输入6-18位密码').css('color','#ccc');
				});
			//失去焦点
			upwd.blur(function()
			{
				var preg = /^[0-9a-zA-Z\W_]{6,18}$/;
				if(preg.test(upwd.val())){
					//发送ajax验证是否存在
					$.post("{{url('pass/upwd')}}/"+upwd.val(),{'_token':"{{csrf_token()}}"},function(msg)
						{
							//判断结果
							if(msg == 1){
								$('#span1').text(' ' ).css('color','red');
								s1 = true;
							}else{
								$('#span1').text('密码不正确' ).css('color','red');
								s1 = false;
							}
						});
				}else{
					$('#span1').text('密码格式不正确').css('color','red');
					s1 = false;
				}
			});

			//获取新密码
			var password = $('input[name="password"]');
			//聚焦
			password.focus(function()
				{
					$('#span2').text('请输入6-18位的新密码').css('color','#ccc');
				});
			//失去焦点
			password.blur(function()
			{	
				var preg = /^[0-9a-zA-Z\W_]{6,18}$/;
				if(preg.test(password.val())){
					if(upwd.val() == password.val()){
						$('#span2').text('不能与原密码相同').css('color','red');
						s2 = false;
					}else{
						$('#span2').text('  ').css('color','red');
						s2 = true;
					}
				}else{
					$('#span2').text('密码格式不正确').css('color','red');
					s2 = false;
				}
			});
			//获取确认密码
			var repassword = $('input[name="repassword"]');
			// 
			//聚焦
			repassword.focus(function()
				{

				});
			repassword.blur(function()
				{
					if(repassword.val() == password.val()){
						s3 = true;
					}else{
						$('#span3').text('密码不一致').css('color','red');
						s3 = false;
					}
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

@endsection