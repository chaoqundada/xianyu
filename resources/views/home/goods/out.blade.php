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
				<th class="time">发布时间</th>
				<th class="name">商品名称</th>
				<th class="amount">价格</th>
				<th class="amount">状态</th>
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
					<p>{{date('Y-m-d H:i:s', $v['gtime'])}} </p>
					<!-- <p class="text-muted"> 10:58</p> -->
				</td>
				<td class="title name" style="width:200px">
					<p class="content">{{$v['gname']}}</p>
				</td>
				<td class="amount">
					<span class="amount-pay">{{$v['gpic']}}</span>
				</td>
				<td class="amount">
					<span class="amount-pay">
						@if($v['ostatic'] == 2)
							<a href="javascript:;" onclick="DelGoods({{$v['oid']}})">已付款发货</a>
						@elseif($v['ostatic'] == 3)
							已发货
						@elseif($v['ostatic'] == 4)
							已收货
						@elseif($v['ostatic'] == 1)
							未付款
						@endif
					</span>
				</td>
			</tr>
			@endforeach
		@endif
		</tbody>
	</table>
		<div class="container" style="margin-left:-15px">
			{!! $data->render() !!}
		</div>
	<script>
        //确认发货
        function DelGoods(oid){
            //询问框
            layer.confirm('是否确认发货？', {
                btn: ['确定','取消'] 
            }, function(){
                $.post("{{url('goods/deliver/')}}/"+oid,{'_token':"{{csrf_token()}}"},function(data){
                if(data == 1){
                    location.href = location.href;
                    layer.msg('发货成功', {icon: 6});
                }else{
                    location.href = location.href;
                    layer.msg('发货失败', {icon: 5});
                }
                });
            }, function(){
            });

        }        
    </script>
@endsection