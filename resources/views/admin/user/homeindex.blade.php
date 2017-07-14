@extends('admin.layout.index')
@section('content')

    
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
   
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">后台用户列表</header>
      <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
        <div class="row">
<!-- 搜索条件表单 -->
        <form action="{{url('/admin/homeuser/index')}}" method='get'>
          <div class="col-sm-6">
            <div id="sample_1_length" class="dataTables_length">
              <label>
                <select size="1" name="sample" aria-controls="sample_1" class="form-control" id="sample">
                  <option value="5" @if($cont==5) selected @endif>5</option>
                  <option value="10" @if($cont==10) selected @endif>10</option>
                  <option value="15" @if($cont==15) selected @endif>15</option>
                </select>显示条数</label>
            </div>
          </div>
          <div class="col-sm-6" >
            <div class="dataTables_filter" id="sample_1_filter" >搜索:
              <label style="width:200px;">
                <input type="text" aria-controls="sample_1" class="form-control" id='search' name='search' style="width:100%" value="{{$all['search']}}" placeholder="用户名">
              </label>
              <input type="submit" class="btn btn-default" value='搜索'>
            </div>
          </div>
        </form>    
<script type="text/javascript">
    //对搜索绑定事件
    $('#search').change(function()
      {
        $.get("{{url('/admin/user/index')}}",{'search':$(this).val()},function(msg)
          {
            
          });
      });
    //对条数绑定事件
    $('#sample').change(function(){
      $.get("{{url('/admin/user/index')}}",{'sample':$(this).val()},function(msg)
          {
            if(msg){
             
            }
            
          });
    });
</script>

<!-- 结束搜索 -->

        </div>
        <table class="table table-striped border-top dataTable" id="sample_1" aria-describedby="sample_1_info">
          <thead>
            <tr role="row">
                <th >ID</th>
                <th>用户名</th>
                <th>手机号</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
          </thead>
          <tbody role="alert" aria-live="polite" aria-relevant="all">
          @if(!empty($data))
            @foreach($data as $k => $v)
            <tr class="gradeX odd">
              <td>{{$v['uid']}}</td>
              <td>{{$v['uname']}}</td>
              <td>{{$v['phone']}}</td>
              <td>{{$brr[$v['static']]}}</td>
              <td>
                @if($v['static'] == 1)
                  <span class="btn btn-danger" onclick="status({{$v['uid']}})">封杀</span>
                @else
                  <span  class="btn btn-warning" onclick="unset({{$v['uid']}})">解封</span>
                @endif
              </td>
            </tr>
            @endforeach
        @endif
          </tbody>
        </table>
        <div class="row">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <div class="dataTables_paginate paging_bootstrap pagination">
                {!! $data->appends($all)->render() !!}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script type="text/javascript">

    //封杀用户
    function status(uid)
    {
      $.post("{{url('admin/homeuser/status')}}/"+uid,{'_token':"{{csrf_token()}}"},function(msg)
        {
          //判断结果
          if(msg == 1){
            location.href = location.href;
          }else{
            location.href = location.href;
          }
        });
    }
    //解封用户
    function unset(uid)
    {
      $.post("{{url('admin/homeuser/unset')}}/"+uid,{'_token':"{{csrf_token()}}"},function(msg)
        {
          //判断结果
          if(msg == 1){
            location.href = location.href;
          }else{
            location.href = location.href;
          }
        });
    }
    
    if($('#error')) {
        setTimeout(function () {
            $('#error').slideUp(1000);
        }, 3000);
    }

</script>
 

@endsection
