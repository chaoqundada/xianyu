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
<div class="row">

<div class="col-lg-12">
      <section class="panel">
      <div class="panel-body">
      <!-- 设置开始 -->
        <form method="post" action="{{url('/admin/config/doedit/'.$id)}}" style='width:800px'class="form-horizontal">
        {{ csrf_field() }}
            <div class="form-group form-group-lg">
              <label class="col-sm-2 control-label"  for="content">添加举报类别</label>
              <div class="col-sm-10">
                    <input class="form-control" type="text" name="content" id="content" value="{{$data['content']}}" placeholder="请输入内容" required >
              </div>
            </div><br>
            <div class="form-group form-group-sm">
              <input class="btn btn-info" type="submit"  value="　　　提交　　　" style="margin-left:400px;">
            </div>
        </form>
      </div>
      </section>
  </div>
</div>       
         <!-- 设置结束 -->
     
<script type="text/javascript">
  
  if($('#error')) {
        setTimeout(function () {
            $('#error').slideUp(1000);
        }, 3000);
    }

</script>
  @endsection