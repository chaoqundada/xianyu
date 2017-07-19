@extends('admin.layout.index')
@section('content')


  @if(count($errors) > 0)
      

  @foreach ($errors->all() as $error)
          <span>{{ $error }}</span>
      @endforeach
</div>
    @endif 
 
    
     @if(session('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
     @endif      
    <div class="alert alert-success" role="alert">


	 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              广告列表
                          </header>
                          <table class="table table-striped border-top" id="sample_1">
                          
                            <thead>
                              <tr>
                                  <!-- <th/></th> -->
                                  <th>ID</th>
                                  <th class="hidden-phone">标题</th>
                                  <th class="hidden-phone">发布时间</th>
                                  <th class="hidden-phone">操作</th>
                                  
                              </tr>
                            </thead>
       
                         @foreach ($arr as $v)
                            <tr class="odd gradeX">
                              
                              <td class="hidden-phone">{{ $v['aid'] }}</td>
                              <td class="hidden-phone">{{ $v['atitle'] }}</td>
                              <td class="hidden-phone">{{ date("Y-m-d",$v['atime'])}}</td>
                              
                              <td class="hidden-phone">
                                <form action="/admin/ad/del" method="post">
                                  {{ csrf_field()}}
                                  <input type="hidden" name="aid" value="{{ $v['aid'] }}"> 
                                  <input type="submit" class="btn btn-dange" value="删除">
                                 <a href="/admin/ad/alter?id={{ $v['aid'] }}" class="btn btn-default">修改</a>
                                </form>
                              </td>
                             </tr>
                               @endforeach

                               <tr><center>{!! $arr->render() !!}</center></tr>
                            </table>




@endsection