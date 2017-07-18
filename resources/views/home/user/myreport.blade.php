@extends('home.layout.detil')
@section('content')
<div class="am-cf am-padding">
	<div class="am-fl am-cf">
		<strong class="am-text-danger am-text-lg">举报列表</strong>
	</div>
</div>
<hr>
<style type="text/css">
	


</style>
<!--交易时间	-->
<div style="width:100%;height:450px">
<table width="100%">
	<thead>
		<tr>
			<th>商品</th>
			<th>名称</th>
			<th>举报类别</th>
			<th>时间</th>
			<th>操作</th>
			
		</tr>
	</thead>
	<tbody>
	@if(!empty($data))
		@foreach($data as $v)
		<tr>
			<td style="width:75px;">
				<a href="{{url('/goods/details/').'/'.$v['gid']}}"><i><img src="/{{$v['gsmallpic']}}"></i></a>
			</td>
			
			<td>
				<p class="content">
					{{$v['gname']}}
				</p>
			</td>

			<td>
				<span class="amount-pay">{{$v['content']}}</span>
			</td>
			<td>
				<p> {{date('Y年m月d日',$v['jtime']) }}
				</p>
			</td>
			<td>
				<a href="javascript:;" class='del'>删除</a>
			</td>
		</tr>
		@endforeach
	@endif
	</tbody>
</table>
</div>
<div style="clear:both"></div>
<div>
	{!! $data->render() !!}
</div>
<script type="text/javascript">
	$('.del').click(function(){
		layer.confirm('确认要删除该消息吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post("{{url('/report/del')}}",{"anid":"{{isset($v) ? $v['anid'] : ''}}","_token":"{{csrf_token()}}"},function(data){
                if(data.status == 1){
                    
                    layer.msg(data.msg);
                    location.href = location.href;
                }else{
                    //location.href = location.href;
                    layer.msg(data.msg);
                }
                });
            }, function(){
            		layer.msg('你是不是手残？', {
    				time:5000, //20s后自动关闭
   					btn: ['是', '肯定是']
 					 });
            });
	});
</script>

				

@endsection