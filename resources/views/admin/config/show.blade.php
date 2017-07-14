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
      <header class="panel-heading">举报类别列表</header>
      <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
        <table class="table table-striped border-top dataTable" id="sample_1" aria-describedby="sample_1_info">
          <thead>
            <tr role="row">
                <th >ID</th>
                <th>类别名称</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
          </thead> 
          @if(!empty($data))
            @foreach($data as $v)
          <tbody role="alert" aria-live="polite" aria-relevant="all">
              <tr class="gradeX odd" style="width:100px">
                  <td>{{$v['reid']}}</td>
                  <td>{{$v['content']}}</td>
                  <td>{{date('Y-m-d H:i:s',$v['ttime'])}}</td>
                  <td>
                  <a href="{{url('admin/config/delreport/'.$v['reid'])}}" class="btn btn-danger" onclick=" return confirm('您确定要删除吗?')" >删除</a>
                  <a href="{{url('admin/config/editreport/'.$v['reid'])}}" class="btn btn-warning">修改</a>
                  </td>
            </tr>
            @endforeach
          @endif
          </tbody>
        </table>
        <div class="row">
          <div class="col-sm-6">
           {!! $data->render()  !!}
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script type="text/javascript">
    
    if($('#error')) {
        setTimeout(function () {
            $('#error').slideUp(1000);
        }, 3000);
    }

</script>
 

@endsection
