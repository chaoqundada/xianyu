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
				<th class="amount">收藏量</th>
				<th class="amount">点击量</th>
				<th class="amount">状态</th>
				<th class="action">操作</th>
			</tr>
		</thead>
		<tbody >
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
					<span class="amount-pay">{{$v['gcoll']}}</span>
				</td>
				<td class="amount">
					<span class="amount-pay">{{$v['gclick']}}</span>
				</td>
				<td class="amount">
					<span class="amount-pay">{{$arr[$v['gstatic']]}}</span>
				</td>
				<td class="operation">
					@if($v['gstatic'] == 1)
						<a href="/goods/lower/{{$v['gid']}}">下架</a>
					@endif
					@if($v['gstatic'] == 2)
						<a href="/goods/upper/{{$v['gid']}}">上架</a>
					@endif
					<a href="/goods/edit/{{$v['gid']}}">修改</a>
					<a href="javascript:;" onclick="DelGoods({{$v['gid']}})">删除</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
		<div class="container" style="margin-left:-15px">
			{!! $data->render() !!}
		</div>
	<script>

        function DelGoods(gid){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post("{{url('goods/delete/')}}/"+gid,{'_method':'post','_token':"{{csrf_token()}}"},function(data){
                if(data.status == 0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 5});
                }
                });


            }, function(){

            });

        }


    </script>
@endsection