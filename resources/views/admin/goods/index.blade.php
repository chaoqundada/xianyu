@extends('admin.layout.index')
@section('content')
<section class="panel">
  <header class="panel-heading">
      商品列表
  </header>
  <table class="table table-striped table-advance table-hover">
      <thead>
      <tr>
          <th style="width:100px">ID</th>
          <th style="width:250px">缩略图</th>
          <th>发布时间</th>
          <th>商品名称</th>
          <th>价格</th>
          <th style="width:250px">操作</th>
      </tr>
      </thead>
      <tbody>
      @foreach($data as $k=>$v)
      <tr>
          <td><a href="#">{{$v['gid']}}</a></td>
          <td class="hidden-phone"><a href="#"><i><img  src="/{{$v['gsmallpic']}}" style="width:100px"></i></a></td>
          <td>{{date('Y-m-d H:i:s', $v['gtime'])}}</td>
          <td>{{$v['gname']}}</td>
          <td>{{$v['gpic']}}</td>
          <td>
              <button class="btn btn-danger btn-xs" onclick="fun({{$v['gid']}})"><i class="icon-trash "></i></button>
          </td>
      </tr>
      @endforeach
  </table>
    <div class="container" style="margin-left:-15px;float:left;">
      {!! $data->render() !!}
    </div>
    <div style="float:right;margin-top:18px;margin-right:30px;">
        <form class="form-inline" action="/admin/goods/index" method="get">
          <div class="form-group">
            <input type="text" name="gids"class="form-control"  placeholder="请输入ID">
          </div>
          <button type="submit" class="btn btn-primary">搜索</button>
      </form>
    </div>
</section>
<script>
   
        function fun(gid){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("/admin/goods/delete/"+gid,{'_method':'post','_token':"{{csrf_token()}}"},function(data){
                    if(data.status == 0){
                        
                        layer.msg(data.msg, {icon: 6});
                        location.href = "{{url('admin/goods/index')}}";
                    }else{
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }
                });

            });

        }


    </script>
@endsection