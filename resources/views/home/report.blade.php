@extends('home.layout.gdetails')
@section('content')
<link href="/homes/css/sortstyle.css" rel="stylesheet" type="text/css" />
<link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />	

<div class="main-wrap">
	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">商品详情：</strong></div>
	</div>
	<hr>
	<div class="comment-list">

		<div class="record-aside">
			<div class="item-pic">
				<a href="#" class="J_MakePoint">
					<img src="{{asset('/'.$goods['gsmallpic'])}}" class="itempic">
				</a>
			</div>

			<div class="item-title">

				<div class="item-name">
					<a href="#">
						<p class="item-basic-info">{{$goods['gname']}}</p>
					</a>
				</div>d
				<div class="info-little">
					详情：{!!$goods['gdesc']!!}	
				</div>
			</div>
			<div class="item-info">
				<div class="item-ordernumber">
					<span class="info-title">价格：{{$goods['gpic']}}</span>
				</div>


			</div>
			<div class="clear"></div>
		</div>

		<div class="record-main">
			<div class="detail-list refund-process">
			    <div class="fund-tool" style="font-size:18px;font-style:italic">请选择类型：(举报消息可在个人中心查看)</div>
			</div>
		<div class="clear"></div>
			<ul>
			@if(!empty($data))
				@foreach($data as $v)
				<li class="li_li" value="{{$v['reid']}}" name=''>{{$v['content']}}</li>
				@endforeach
			@endif
				<li class="li_li1">更多举报类型正在火速开发中</li>
			</ul>
		</div>

	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript">
	$('.li_li').click(function(){
		var v = $(this).val();

		layer.confirm('确认要举报该商品吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.get("{{url('/report/ajax')}}",{"gid":"{{$goods['gid']}}","reid":v},function(data){
                if(data.status == 1){
                    
                    layer.msg(data.msg);
                    location.href = "{{url('/')}}";
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
	}).mouseover(function(){
		$(this).css('background','#ccc');
	}).mouseout(function(){
		$(this).css('background','');
	});
</script>


            
       
@endsection
			
