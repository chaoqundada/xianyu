@extends('home/layout/goods')
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
				<th class="memo">买家</th>
				<th class="time">申请时间</th>
				<th class="name">商品名称</th>
				<th class="amount">价格</th>
				<th class="amount">退款金额</th>
				<th class="amount">申请退款</th>
			</tr>
		</thead>
		<tbody >
		@if($data)
			@foreach($data as $k=>$v)
			<tr>
				<td class="img">
					<a href="/goods/details/{{$v['gid']}}"><i><img  src="/{{$v['gsmallpic']}}" style="width:100px;height:100px;"></i></a>
					<input type="hidden" name="gsmallpic" value="{{$v['gsmallpic']}}">
				</td>
				<td class="time" style="width:150px">
					<p>{{ $v['uname']}} </p>
				</td>
				<td class="time" style="width:150px">
					<p>{{date('Y-m-d H:i:s', $v['gtime'])}} </p>
				</td>
				<td class="title name" style="width:200px">
					<p class="content">{{$v['gname']}}</p>
				</td>
				<td class="amount">
					<span class="amount-pay">{{$v['gpic']}}</span>
				</td>
				<td class="amount">
					<span class="amount-pay">{{$v['gpic']}}</span>
				</td>
				<td class="amount">
					<span class="amount-pay">
						<a href="javascript:;" onclick="agree({{$v['oid']}})"><i>是否同意退款</i></a>
					</span>
				</td>
			</tr>
			<script>
				//确认退款
		        function agree(oid){
		            //询问框
		            layer.confirm('是否确认退款？', {
		                btn: ['确定','取消'] //按钮
		            }, function(){
		                $.post("{{url('goods/agree/')}}/"+oid,{'gid':{{$v['gid']}},'_token':"{{csrf_token()}}"},function(data){
		                if(data == 1){
		                    location.href = location.href;
		                    layer.msg('退款成功', {icon: 6});
		                }else{
		                    location.href = location.href;
		                    layer.msg('退款失败', {icon: 5});
		                }
		                });
		            }, function(){
		            });

		        }
		    </script>
			@endforeach
		@endif
		</tbody>
	</table>
@endsection