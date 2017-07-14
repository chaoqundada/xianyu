@extends('admin.layout.index')
@section('content')

  @if (session('error'))
        <div class="alert alert-block alert-danger fade in" id="error">
        
            <font size="5"><i class="icon-remove-sign"></i>{{session('error')}}</font>
           
        </div>
    @endif
    
    @if (session('succee'))
        <div class="alert alert-block alert-success fade in" id="error">
        
            <font size="5"><i class="icon-ok-sign"></i>session('succee')</font>
        </div>
    @endif
   






	<section class="panel">
      <header class="panel-heading">
         添加管理员
      </header>
      <div class="panel-body">
          <form role="form" action="{{url('admin/user/doedit/'.$data['uid'])}}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="username">用户名</label>
                  <input type="text" readonly class="form-control" id="username"  name='uname' value="{{$data['uname']}}">
                    <span id="foruname"></span>
              </div>
              <div class="form-group">
                  <label for="myphone">手机号</label>
                  <input type="text" class="form-control" id="myphone" name='phone' value="{{$data['phone']}}">
                  <span id="forphone"></span>
              </div>
             <div class="form-group">
                  <label for="myemail">邮箱</label>
                  <input type="email" class="form-control" required id="myemail"  name='email' value="{{$data['email']}}">
              </div>
              @if(session('admin_user')['auth']==2)
              <div class="radio">
                  <label>
                      <input type="radio" name="auth" id="optionsRadios1" value="1" @if($data['auth']==1) checked @endif>
                      普通管理员
                  </label>
              </div>
              <div class="radio">
                  <label>
                      <input type="radio" name="auth" id="optionsRadios1" value="2" @if($data['auth']==2) checked @endif>
                      超级管理员
                  </label>
              </div>
              @endif

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