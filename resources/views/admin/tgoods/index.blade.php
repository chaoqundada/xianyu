@extends('admin.layout.index')
@section('content')
<div class="col-lg-12">
	<section class="panel">
	  <header class="panel-heading">
	      商品分类列表
	      <div id="ooxx">
	      	@if(session('error'))
					{{session('error')}}
	      	@endif
	      </div>
	      <script type="text/javascript">
	      			$('#ooxx').click(function(){
	      				$(this).hide();
	      			})
	      </script>
	  </header>
	  <table class="table table-striped table-advance table-hover">
	      <thead>
	      <tr>
	          <th>ID</th>
	          <th>类别名称</th>
	          <th>操作</th>
	      </tr>
	      </thead>
	      <tbody>
	      @foreach($data as $v)
	     
	      <tr>
	          <td>{{$v['tid']}}</td>
	          <td>{{$v['tname']}}</td>
	          <td>
	              <a href="/admin/tgoods/edit/{{$v['tid']}}"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
	              <a onclick="return confirm('您确认要删除吗?')" href="/admin/tgoods/delete/{{$v['tid']}}"><button class="btn btn-danger btn-xs" $tid={{$v['tid']}}><i class="icon-trash "></i></button></a>
	          </td>
	      </tr>
	     
	      @endforeach
	      </tbody>
	  </table>
	</section>
</div>
@endsection