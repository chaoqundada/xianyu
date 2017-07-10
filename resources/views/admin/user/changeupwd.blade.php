@extends('admin.layout.index')
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-block alert-danger fade in" id="error">
            <font size="5">添加失败</font>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if (session('succee'))
        <div class="alert alert-block alert-success fade in" id="error">
        
            <font size="5"><i class="icon-ok-sign"></i>{{session('succee')}}</font>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-block alert-danger fade in" id="error">
        
            <font size="5"><i class="icon-remove-sign"></i>{{session('error')}}</font>
        </div>
    @endif
   






	<section class="panel">
      <header class="panel-heading">
         密码修改
      </header>
      <div class="panel-body">
          <form role="form" action="{{url('admin/user/dochange')}}" method="post">
              {{ csrf_field() }}
                <div class="form-group">
                  <label for="oldupwd">旧密码</label>
                  <input type="password" class="form-control" id="oldupwd" placeholder="请输入旧密码" name='oldupwd'  >
                  <span id="foroldupwd"></span>
              </div>
              <div class="form-group">
                  <label for="pass">密码</label>
                  <input type="password" class="form-control" id="pass" placeholder="6-12位密码" name='upwd'  >
                  <span id="forpass"></span>
              </div>
              <div class="form-group">
                  <label for="repass">确认密码</label>
                  <input type="password" class="form-control" id="repass" placeholder="确认密码" name='reupwd'>
                  <span id="forrepass"></span>
              </div>
               <div class="form-group">
                  <label for="code">验证码</label>
                  <input type="text" class="form-control" id="code" placeholder="输入验证码" name='code'>
                  <img src="{{url('/code')}}" alt="加载中.." title="点击切换验证码" onclick="this.src='{{url('/code')}}?'+Math.random()">
              </div>
              <button type="submit" class="btn btn-info" id="sub">提交</button>
          </form>
      </div>
    </section>
    <script>


    

    if($('#error')) {
        setTimeout(function () {
            $('#error').slideUp(1000);
        }, 3000);
    }


 
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


@endsection