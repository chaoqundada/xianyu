@extends('admin.layout.index') 



@section('content')
    <section class="wrapper">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">轮播列表</header>
        <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
          <div class="row">
            <form action="/admin/slide/index" method="get">

            <div class="col-sm-6" >
              <div class="dataTables_filter" id="sample_1_filter" style="float: left;">
                <label style="width:200px;">关键字:<input type="text" name="search"  class="form-control" value=""></label>
                <button class="btn btn-info">查询</button>
                
                  
              </div>
            </div>
           </form>  
          </div>
          <table class="table table-bordered" id="sample_1" aria-describedby="sample_1_info">
            <thead>
              <tr role="row">
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 50px;">排序</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 100px;">序号</th>

                <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 176px;">轮播图</th>

                <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 333px;">轮播地址</th>

                <th class="hidden-phone sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 219px;">操作</th>

              </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
             @foreach($data as $k=>$v)
              <tr class="gradeX odd">
                <td class=" ">
                <input style="width: 40px;" type="text" value="{{$v['sort']}}" onchange="changeorder(this,{{$v['sid']}} )">
                </td>

                <td class="">{{$v['sid']}}</td>

                <td style=" overflow:hidden;">
                  <img src="{{url($v['spath'])}}" style="height:100px;" alt="">
                </td>

                <td style=" overflow:hidden;">{{$v['surl']}}</td>

                

                <td class="hidden-phone ">
                  <a href="javascript:;" onclick="DelTitle({{$v['sid']}})" class="btn btn-danger btn-xs"><i class="icon-trash "></i>
                  </a>
                  <a href="/admin/slide/edit/{{$v['sid']}}" class="btn btn-primary btn-xs"><i class="icon-pencil"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row">

          

            <div class="col-sm-6">
             
                <div class="pagination pagination-lg">
                {!! $data->appends($request)->render() !!}
                </div>
            </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- page end--></section>
  <script>
    // 排序
    function changeorder(obj,sid)
    {
       
        var sort = $(obj).val();
         // alert(sort);
        // console.log(sort);
        $.post("{{url('admin/changeorder')}}/"+sid,{'_token':"{{csrf_token()}}",'sort':sort},function(data){
          if(data.status == 0){
            location.href = location.href;
             layer.msg(data.msg,{icon:1});
          }else{
             layer.msg(data.msg,{icon:2});
            location.href = location.href; 
          } 
        });
    }
  // 删除
    function DelTitle(sid){
    
    layer.confirm('您确定要删除吗？',{
      btn: ['确定','取消'] //按钮
      }, function(){

        $.post("{{url('admin/slide/del')}}/"+sid,{'_token':"{{csrf_token()}}"},function(data){
          if(data.status == 0){
            location.href = location.href;
            layer.msg(data.msg,{icon:1});
          }else{
            layer.msg(data.msg,{icon:2});
          } 
          });

        
    },function(){


    });

  }

  </script>
  

@endsection