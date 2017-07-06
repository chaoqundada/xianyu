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
        
            <font size="5"><i class="icon-ok-sign"></i>添加成功</font>
        </div>
    @endif
   






	<section class="panel">
      <header class="panel-heading">
         添加管理员
      </header>
      <div class="panel-body">
          <form role="form" action="{{url('admin/user/doadd')}}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="username">用户名</label>
                  <input type="text"  class="form-control" id="username" placeholder="用户名" name='uname' value="{{old('uname')}}">
                    <span id="foruname"></span>
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
                  <label for="myphone">手机号</label>
                  <input type="text" class="form-control" id="myphone" placeholder="手机号" name='phone' value="{{old('phone')}}">
                  <span id="forphone"></span>
              </div>
             <div class="form-group">
                  <label for="myemail">邮箱</label>
                  <input type="email" class="form-control" required id="myemail" placeholder="邮箱" name='email' value="{{old('email')}}">
              </div>
              <div class="radio">
                  <label>
                      <input type="radio" name="auth" id="optionsRadios1" value="1" checked>
                      普通管理员
                  </label>
              </div>

              <div class="radio">
                  <label>
                      <input type="radio" name="auth" id="optionsRadios1" value="2">
                      超级管理员
                  </label>
              </div>
              <button type="submit" class="btn btn-info" id="sub">提交</button>
          </form>

      </div>
    </section>
    <script>


    //请求用户名ajax
        $('#username').blur(function(){
            var uname = $(this).val();
            if(uname.length<5)
            {
                $('#foruname').html('<font style="color:red;font-size:17px;"><i class="icon-remove"></i>用户名太短了</font>');
            }else {
                $.get("{{url('/admin/user/ajax')}}", {uname: uname}, function (msg) {
                    if (msg == 2) {
                        $('#foruname').html('<font style="color:red;font-size:17px;"><i class="icon-remove"></i>用户名已存在</font>');
                    }
                    if (msg == 1) {

                        $('#foruname').html('<font style="color:green;font-size:17px;"><i class="icon-check-sign"></i>用户名可用</font>');
                    }
                });
            }
        });


    if($('#error')) {
        setTimeout(function () {
            $('#error').slideUp(1000);
        }, 3000);
    }


    //判断手机

    var preg_phone = /^1[3|4|5|8][0-9]\d{8}$/;
    $('#myphone').blur(function(){
      if(preg_phone.test($(this).val()))
      {

          $('#forphone').html('<font style="color:green;font-size:17px;"><i class="icon-check-sign"></i>手机号可用</font>');
      }else
      {
          $('#forphone').html('<font style="color:red;font-size:17px;"><i class="icon-remove"></i>请输入正确的手机号</font>');
      }
    });

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
        });

        //验证邮箱
        var preg_email = /\w+([-+.]\w+)*@\w+([-.]\w+)*.\w+([-.]\w+)*/;
        $('#myemail').blur(function(){
            if(!preg_email.test($(this).val()))
            {
                $('#foremail').html('<font style="color:red;font-size:17px;"><i class="icon-remove"></i>请填写正确的邮箱地址</font>');
            }else
                {

                    $('#foremail').html('<fqont style="color:green;font-size:17px;"><i class="icon-check-sign"></i>邮箱正确</fqont>');
                }
        });

    </script>


@endsection