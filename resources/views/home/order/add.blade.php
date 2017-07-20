@extends('home/layout/order')
@section('content')
	<div class="am-cf am-padding">
		<div class="am-fl am-cf">
			<strong class="am-text-danger am-text-lg">商品明细</strong>
		</div>
	</div>
	<table width="100%">
		<thead>
			<tr>
				<th class="memo"></th>
				<th class="name">商品名称</th>
				<th class="amount">价格</th>
				<th class="action">操作</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="img" style="width:150px;">
					<a href="/goods/details/{{$data['gid']}}"><i><img  src="{{url($data['gsmallpic'])}}" style="width:100px;height:100px;"></i></a>
				</td>
				<td class="time" style="width:150px">
					<p>{{$data['gname']}} </p>
					<!-- <p class="text-muted"> 10:58</p> -->
				</td>
				<td class="amount" style="width:200px">
					<p class="content">{{$data['gpic']}}</p>
				</td>
				<td class="operation " >
				     <button type="button" onclick="buy({{$data['gid']}})" class="btn btn-primary"  data-toggle="modal" data-target="#createAlbum">
					  付款
					</button>
				     &nbsp;&nbsp;
				</td>
			</tr>
			
		</tbody>
	</table>
	<font style="float:right;">
		<a class="btn btn-primary" href="{{url('addr/oadd')}}">添加地址</a>
	</font>
	<table  class="table table-bordered" style="margin-top:30px;">
			<tr>
				<th>收货人</th>
				<th>收货地址</th>
				<th>收货人手机号</th>
				<th>设置收货地址</th>
			</tr>
			@if($addr)
			 	@foreach($addr as $k => $v)
					<tr>
						<td>{{$v['name']}}</td>
						<td class="time" style="width:400px">
							{{$v['P2']}}&nbsp;&nbsp;{{$v['C2']}}&nbsp;&nbsp;{{$v['uaddr']}} 
						</td>
						<td class="amount" style="width:200px">
							<p class="content">{{$v['phone']}}</p>
						</td>
						<td class="operation " >
							<input type="radio" name='input' value="{{$v['huaid']}}" @if($v['huasttic'] == 1) checked @endif>
							@if($v['huasttic'] == 1) 
								<font class="btn btn-info">默认收货地址</font>
							@else
								<span class="btn btn-success" onclick="moren({{$v['huaid']}})">改为默认地址</span>
							@endif
						</td>
					</tr>
				@endforeach
			@endif
		</table>			
<div class="modal fade" id="createAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:300px;">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title" id="myModalLabel">是否确认付款</h4>
      </div>
      <div class="modal-body" >
            <div class="form-group" style="margin-top:20px;margin-left:40px;">
	             <a href="{{url('order/payment')}}/{{$data['gid']}}" class="btn btn-primary">确认</a>
	             <a href="{{url('order/index')}}" style="margin-left:80px;"  class="btn btn-danger">取消</a>
            </div>
      </div>
    </div>
  </div>
</div>
<script>
		//发送添加订单
		function buy(gid)
		{
			//获取地址ID
			var huaid = $('input:checked').val();
			if(huaid){
				//付款生成订单
				$.post("{{url('order/insert')}}/"+gid,{'huaid':huaid,'_token':"{{csrf_token()}}"},function(msg)
					{
						//判断结果
						if(msg != 1){
							location.href = location.href;
							layer.msg('下单失败', {icon: 5});
						}
					});
			}else{
				location.href = location.href;
				layer.msg('请去添加地址', {icon: 5});
			}		
		}
		//修改默认收货地址
			function moren(huaid)
			{
				$.post("{{url('addr/status')}}/"+huaid,{'uid':"{{session('user')['uid']}}",'_token':"{{csrf_token()}}"},function(msg)
					{
						//判断结果
						if(msg == 1){
							location.href = location.href;
						}else{
							location.href = location.href;
						}
					});
			}
</script>
@endsection