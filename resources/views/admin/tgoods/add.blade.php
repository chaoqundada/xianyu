@extends('admin.layout.index')
@section('content')
	<div class="row">
	  <div class="col-lg-12">
	      <section class="panel">
	          <header class="panel-heading">
	              添加商品分类
	          </header>
	          <div class="panel-body">
	              <form role="form" class="form-horizontal tasi-form" method="post" action="/admin/tgoods/insert">
	             
	                  <div class="form-group has-success">
	                      <label class="col-lg-2 control-label">父类名称</label>
	                      <select name="pid">
	                      	<option value="0">添加分类</option>
	                      	@if(!empty($res))
								@foreach($res as $v)
									<option value="{{$v['tid']}}">{{$v['tname']}}</option>	
								@endforeach
	                      	@endif
	                      </select>
	                  </div>
	                  <div class="form-group has-error">
	                      <label class="col-lg-2 control-label">类别名称</label>
	                      <div class="col-lg-10" style="width:200px">
	                          <input type="text" name="tname" placeholder="" id="l-name" class="form-control">
	                      </div>
	                  </div>
	                   {{csrf_field()}}
	                  <div class="form-group">
	                      <div class="col-lg-offset-2 col-lg-10">
	                          <button class="btn btn-danger" type="submit">添加</button>
	                      </div>
	                  </div>
	              </form>
	          </div>
	      </section>
	  </div>
	</div>
@endsection