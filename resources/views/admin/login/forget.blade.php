<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{Config::get('app.title')}}</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <!-- <link rel="icon" type="image/png" href="{{asset('/login/assets/i/favicon.png')}}"> -->
  <!-- <link rel="apple-touch-icon-precomposed" href="{{asset('/login/assets/i/app-icon72x72@2x.png')}}"> -->
  <script src="{{asset('/login/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('/login/assets/js/amazeui.min.js')}}"></script>
  <script src="{{asset('/login/assets/js/app.js')}}"></script>
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="{{asset('/login/assets/css/amazeui.min.css')}}" />
  <link rel="stylesheet" href="{{asset('/login/assets/css/admin.css')}}">
  <link rel="stylesheet" href="{{asset('/login/assets/css/app.css')}}">
</head>

<body data-type="login">

    @if (session('error'))
        <div class="alert alert-block alert-danger fade in" id="error">
        
            <font size="5"><i class="icon-remove-sign"></i>{{session('error')}}</font>
           
        </div>
    @endif


  <div class="am-g myapp-login" style="background-image:url('/login/assets/i/1.jpg')">
    <div class="myapp-login-logo-block  tpl-login-max">
        <div class="myapp-login-logo-text">
            <div class="myapp-login-logo-text">
                <span>找回密码</span> <i class="am-icon-skyatlas"></i>
                
            </div>
        </div>
            
        <div class="am-u-sm-10 login-am-center">
        
                        <a href="" ><span style="color:#ec0d0d;margin-left:400px;font-size:20px;">联系我们</span></a>
    
            <form class="am-form" method="post" action="{{url('/admin/login/doforget')}}">
            {{csrf_field()}}
                <fieldset>
                    <div class="am-form-group">
                        <input type="text" name="uname" id="uname" placeholder="输入用户名" value="{{old('uname')}}">
                        <span id="foruname"></span>
                    </div>
                    <div class="am-form-group">
                        <input type="email" name="email" id="email" placeholder="输入绑定的邮箱" value="{{old('email')}}">
                        <span id="foremail"></span>
                    </div>
                    <div class="am-form-group">
                        <input type="text" name="code" id="code" placeholder="请输入验证码" style="width:320px;float:left;"><img src="{{url('code')}}" alt="加载中.." title="验证码" onclick="this.src='{{url('/code')}}?'+Math.random()" style="float:right;margin-top:2px;">
                    </div>
                    <p><button type="submit" id="btn" class="am-btn am-btn-default">确认</button></p>
                </fieldset>
            </form>

            
        </div>
    </div>
</div>
    <script type="text/javascript">

    var email = null;
    var s1=s2=true;
    $('#uname').change(function(){
        $.post('{{url('/admin/login/ajax')}}',{'_token':"{{csrf_token()}}",'uname':$(this).val()},function(msg){
            
            if(!msg){
                $('#foruname').html('<font style="color:red;font-size:16px;">用户名不正确</font>');
                s1=false;
                return;
            }else{
                email=msg;
                $('#foruname').html('');
            }
        });
    });

    $('#email').change(function(){
        
        if(email!=$(this).val())
        {
            $('#foremail').html('<font style="color:red;font-size:16px;">邮箱不正确</font>');
            s2=false;
            return;
        }else{
            $('#foremail').html('');
        }
    });

    $('#btn').click(function(){
        if(!(s1 && s2))
        {
            return false;
        }

    });
    </script>
  
</body>

</html>