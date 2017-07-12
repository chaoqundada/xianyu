@extends('home/layout/detil ')
@section('content')


<div class="am-cf am-padding">
	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定手机</strong> / <small>Bind&nbsp;Phone</small></div>
</div>
<hr>
 <font style="display: block;height: 20px; font-size:19px; color:red; margin-left:500px;">
 	@if(session('error'))
 		{{session('error')}}
 	@endif
 </font>
 <form method="post" action="{{url('pass/insert')}}" class="am-form am-form-horizontal" enctype="multipart/form-data">
	<div class="am-form-group bind">
		<label for="user-phone" class="am-form-label">原手机号</label>
		<div class="am-form-content">
			<span id="user-phone">{{ substr_replace(session('user')['phone'],'*****',3,5)}}</span>
		</div>
	</div>
	<div class="am-form-group">
		<label for="user-new-phone" class="am-form-label">新手机号</label>
		<div class="am-form-content">
			<input type="tel" name='phone' value="{{old('phone')}}" id="phone" placeholder="绑定新手机号">
		</div>
		<span id='span1' style="margin-left:105px; color:red;">
			@if($errors -> has('phone')) 新手机号必填 @endif
		</span>
	</div>
	<div class="am-form-group code">
		<label for="user-new-code" class="am-form-label">验证码</label>
		<div class="am-form-content">
			<input type="tel" name="phone_code" id="user-new-code" placeholder="短信验证码">
		</div>
		<a class="btn" href="javascript:void(0);" id="sendMobileCode">
			<div id="yanzheng" class="am-btn am-btn-danger">验证码</div>
		</a>
		<span id='span2' style="margin-left:105px; color:red;">
			@if(session('error')) 验证码错误 @endif
		</span>
	</div>
	{{csrf_field()}}
	<div class="info-btn">
		<input class="am-btn am-btn-danger" type="submit" value="保存修改">
	</div>

</form>
<script type="text/javascript">
	$(function()
		{
			//获取验证码
			$('#yanzheng').click(function()
			{
				var phone = $('#phone').val()

				// 发送ajax 注册手机号
				$.get("{{url('pass/phone')}}",{phone:phone},function(msg)
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

			//手机号
			var tel = $('input[name="phone"');
			//失去焦点
			tel.blur(function()
			{
				//正则验证
				var preg = /^1[3,4,5,7,8]\d{9}$/;
				//判断验证结果
				if(preg.test(tel.val())){			
					$('#span1').text('    ').css('color','blue');
					s3 = true;
				}else{
					$('#span1').text('手机号为空或格式不正确').css('color','red');
					s3 = false;
				}
			});
		});
</script>


@endsection