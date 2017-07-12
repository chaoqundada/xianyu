@extends('admin.layout.index')
@section('content')



  @if (session('error'))
        <div class="alert alert-block alert-danger fade in" id="error">
        
            <font size="5"><i class="icon-remove-sign"></i>{{session('error')}}</font>
           
        </div>
  @endif


<div class="panel-body bio-graph-info">
  <h1>举报详情</h1>
  <form class="form-horizontal" role="form" method='post' action="{{url('/admin/notic/insert')}}">
  {{csrf_field()}}
  	<input type="hidden" name='seller_id' value="{{$seller['uid']}} ">
  	<input type="hidden" name='mter_id' value="{{$informter['uid']}} ">
  	<input type="hidden" name='gid' value="{{$goods['gid']}} ">
      <div class="form-group">
          <label class="col-lg-2 control-label">商品描述</label>
          <div class="col-lg-10">
              <textarea name="" id="" class="form-control" cols="30" rows="10">{{$goods['gdesc']}}</textarea>
          </div>
      </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">商品图片</label>
          <div class="col-lg-10">
        @if(!empty($pics))
          @foreach($pics as $k=>$v)
              <img src="{{$v['gpath']}}" alt="" width="200px">
           @endforeach
        @endif   
          </div>
      </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">举报用户</label>
          <div class="col-lg-6">
          	<font style="font-size:18px;"><i>{{$informter['uname']}}</i></font>	 	
          </div>
      </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">商品名称</label>
          <div class="col-lg-6">
              <font style="font-size:13px;">{{$goods['gname']}}</font>
          </div>
      </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">商品属主</label>
          <div class="col-lg-6">
              <font style="font-size:13px;">{{$seller['uname']}}</font>
          </div>
      </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">商品链接地址</label>
          <div class="col-lg-6">
              <a href="http://{{$goods['gclick']}}"><font style="font-size:13px;">{{$goods['gclick']}}</font></a>
          </div>
      </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">举报类型</label>
          <div class="col-lg-6">
              <font style="font-size:13px;">{{$res['content']}}</font>
          </div>
      </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">举报时间</label>
          <div class="col-lg-6">
              <font style="font-size:13px;">{{date('Y年m月d日H时i分s秒',$notics['jtime'])}}</font>
          </div>
      </div>

      <div class="form-group">
          <label class="col-lg-2 control-label">回复举报者</label>
          <div class="col-lg-6">
              <input type="text" class="form-control" name='formter' value="感谢举报,我们会尽快给予处理!">
          </div>
      </div>
      <div class="form-group">
          <label class="col-lg-2 control-label">回复卖家</label>
          <div class="col-lg-6">
              <input type="text" class="form-control" name='forseller'>
          </div>
      </div>
      <div class="form-group">
         	 <label class="col-lg-2 control-label">对商品操作</label>
    	<div class="radios col-lg-6	">
			  <label class="label_radio r_on" for="radio-01">
			    <input name="put" id="radio-01" value="1" type="radio" @if($goods['gstatic']==1)  disabled checked @endif>上架</label>
			  <label class="label_radio r_off" for="radio-02">
			    <input name="put" id="radio-02" value="2" type="radio" @if($goods['gstatic']==2)  disabled  @endif>下架</label>
		</div>
      </div>

      <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-success" onclick="return confirm('想好了?')">确认</button>
              <button type="button" class="btn btn-default" onclick="window.history.go(-1)">返回</button>
          </div>
      </div>
  </form>
</div>


@endsection