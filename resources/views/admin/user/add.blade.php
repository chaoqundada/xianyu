@extends('admin.common.common')
@section('content')
	<section class="panel">
      <header class="panel-heading">
         添加管理员
      </header>
      <div class="panel-body">
          <form role="form">
              <div class="form-group">
                  <label for="exampleInputEmail1">用户名</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="用户名" name='uname'>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">密码</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="密码" name='upwd'>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">确认密码</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="确认密码" name='reupwd'>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">手机号</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="手机号" name='phone'>
              </div>
             <div class="form-group">
                  <label for="exampleInputPassword1">地址</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="地址" name='addr'>
              </div>
              <button type="submit" class="btn btn-info">提交</button>
          </form>

      </div>
    </section>
@endsection