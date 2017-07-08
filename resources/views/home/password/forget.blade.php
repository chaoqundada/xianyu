<!DOCTYPE html>
<html class="js cssanimations">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>个人资料</title>
    <link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
    <link href="http://www.yysxianyu.com/homes/css/systyle.css" rel="stylesheet" type="text/css">
    <script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <link href="http://www.yysxianyu.com/homes/css/stepstyle.css" rel="stylesheet" type="text/css">
   

</head>

<body>

<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">
    <!-- 内容开始 -->
    
<div class="am-cf am-padding">
	<div class="am-fl am-cf">
		<strong class="am-text-danger am-text-lg">找回密码</strong> / <small></small>
	</div>
</div>
<hr>
<font style="display: block;height: 40px; font-size:19px; color:red; margin-left:500px;">
    @if(session('error'))
        {{session('error')}}
    @endif
 </font>
<form method="post" action="{{url('pass/doforget')}}" enctype="multipart/form-data" class="am-form am-form-horizontal">
    <div class="am-form-group">
        <label for="user-new-phone" class="am-form-label">手机号</label>
        <div class="am-form-content">
            <input type="tel" name='phone' value="{{old('phone')}}" id="phone" placeholder="手机号">
        </div>
        <span id='span1' style="margin-left:85px; display:block;height:20px; color:red;">
            @if($errors -> has('phone')) 手机号必填 @endif
        </span>
    </div>
    <div class="am-form-group code">
        <label for="user-new-code" class="am-form-label">验证码</label>
        <div class="am-form-content">
            <input type="tel" name="phone_code"  id="user-new-code" placeholder="短信验证码">
        </div>
        <a class="btn" href="javascript:void(0);" id="sendMobileCode">
            <div id="yanzheng" class="am-btn am-btn-danger">验证码</div>
        </a>
        <span id='span2' style="margin-left:85px; display:block;height:20px; color:red;">
            @if(session('error')) 验证码错误 @endif
        </span>
    </div>
	<div class="am-form-group">
		<label for="user-new-password" class="am-form-label">新密码</label>
		<div class="am-form-content">
			<input type="password" name="upwd" id="user-new-password" placeholder="输入新密码">
		</div>
		<span id="span3" style="margin-left:85px; display:block;height:20px; color:red;">
            @if($errors -> has('upwd')) 新密码必填 @endif
		</span>
	</div>
	<div class="am-form-group">
		<label for="user-confirm-password" class="am-form-label">确认密码</label>
		<div class="am-form-content">
			<input type="password" name="repassword" id="user-confirm-password" placeholder="请再次输入上面的密码">
		</div>
		<span id="span4" style="margin-left:85px; display:block;height:20px; color:red;">
            @if($errors -> has('repassword')) 密码不一致 @endif
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
                $.get("{{url('pass/phone1')}}",{phone:phone},function(msg)
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

			var s1 = s2 = s3 = false;

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
                    s1 = true;
                }else{
                    $('#span1').text('手机号为空或格式不正确').css('color','red');
                    s1 = false;
                }
            });

			//获取新密码
			var password = $('input[name="upwd"]');
			//聚焦
			password.focus(function()
				{
					$('#span3').text('请输入6-18位的新密码').css('color','#ccc');
				});
			//失去焦点
			password.blur(function()
			{	
				var preg = /^[0-9a-zA-Z\W_]{6,18}$/;
				if(preg.test(password.val())){
					$('#span3').text('  ').css('color','red');
					s2 = true;
				}else{
					$('#span3').text('密码格式不正确').css('color','red');
					s2 = false;
				}
			});
			//获取确认密码
			var repassword = $('input[name="repassword"]');
		    //失焦
			repassword.blur(function()
				{
					if(repassword.val() == password.val()){
                        $('#span4').text('  ').css('color','red');
						s3 = true;
					}else{
						$('#span4').text('密码不一致').css('color','red');
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

    <!-- 内容结束 -->
        </div>
    </div>
</div>

</body>
</html>