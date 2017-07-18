@extends('home/layout/detil ')
@section('content')
<style type="text/css">
	.modal-backdrop.in{
		display: none;
	}
</style>
<div class="user-order">

	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
		
			@if(session('error'))
				<font style="color:red;margin-left:40px;">{{session('error')}}</font>
			@endif
		
	</div>
	<hr>

	<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">

		<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
			<li class="am-active"><a href="#tab1">所有订单</a></li>
			<li class=""><a href="#tab2">待付款</a></li>
			<li class=""><a href="#tab3">待发货</a></li>
			<li class=""><a href="#tab4">待收货</a></li>
			<li class=""><a href="#tab5">待评价</a></li>
		</ul>

		<div class="am-tabs-bd" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
<!-- 所有订单 -->
	
			<div class="am-tab-panel am-fade am-active am-in" id="tab1">
				
				@if($data)
				<div class="order-top">
					<div class="th th-item">
						商品
					</div>
					<div class="th th-price">
						名称
					</div>
					<div class="th th-price">
						价格
					</div>
					<div class="th th-operation">
						商品操作
					</div>
					<div class="th th-status">
						交易状态
					</div>
					<div class="th th-change">
						交易操作
					</div>
				</div>
				
				@foreach($data as $k => $v)
				<div class="order-main">
					<div class="order-list">
						<!--不同状态订单-->
						<div class="order-status3">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{$v['ocode']}}</a></div>
								<span>下单时间：{{date('Y-m-d',$v['xtime'])}}</span>
							</div>
							<div class="order-content">
								<div class="order-left">
<!-- 每个订单 -->			
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="/goods/details/{{$v['gid']}}" class="J_MakePoint">
													<img src="{{url($v['gsmallpic'])}}" class="itempic J_ItemImg">
												</a>
											</div>
											<p style="margin-top:30px;">收货人:{{$v['name']}}&nbsp;&nbsp; 手机号:{{$v['phone']}}</p>
											<p>地址:{{$v['P2']}}&nbsp;&nbsp;{{$v['C2']}}&nbsp;&nbsp;{{$v['uaddr']}}</p>
										</li>
										<li class="td td-price">
											<div class="item-price" style="margin-top:25px;">
												{{$v['gname']}}
											</div>
										</li>
										<li class="td td-price">
											<div class="item-price" style="margin-top:25px;">
												{{$v['gpic']}}
											</div>
										</li>
										<li class="td td-operation">
											<div class="item-operation" style="margin-top:25px;">
											@if($v['ostatic'] == 1)
												<p class="order-info"><a href="javascript:;" onClick="delClick({{$v['gid']}});" >取消订单</a></p>
											@else
												<a href="javascript:;" onclick="fund({{$v['oid']}})">退款/退货</a>
											@endif
											</div>
										</li>
									</ul>
								</div>
								<div class="order-right" >
									<div class="move-right">
										<li class="td td-status" style="margin-left:50px;">
											<div class="item-status" style="margin-top:5px;">
												@if($v['ostatic'] == 1)
												<p class="Mystatus">待付款</p>
												@elseif($v['ostatic'] == 2)
												<p class="Mystatus">未发货</p>
												@elseif($v['ostatic'] == 3)
												<p class="Mystatus">已发货</p>
												@elseif($v['ostatic'] == 4)
												<p class="Mystatus">已收货</p>
												@elseif($v['ostatic'] == 5)
												<p class="Mystatus">退款中</p>
												@elseif($v['ostatic'] == 6)
												<p class="Mystatus">退款完成</p>
												@elseif($v['ostatic'] == 7)
												<p class="Mystatus">已收货</p>
												@endif								
											</div>
										</li>
										<li class="td td-change">
											@if($v['ostatic'] == 3)
												<div  onclick="receipts({{$v['oid']}})"  class="am-btn am-btn-danger anniu">
												确认收货</div>
											@elseif($v['ostatic'] == 1)
												 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteAlbum">
										          付款
										        </button>
											@elseif($v['ostatic'] == 2)
												<div class="am-btn am-btn-danger anniu">
												提醒发货</div>
											@endif
										</li>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="deleteAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-sm" role="document" style="width:200px;">
				    <div class="modal-content" style="text-align:center">
				      <div class="modal-header">
				        <h4 class="modal-title" id="myModalLabel">是否付款</h4>
				      </div>
				      <div class="modal-body">
				      	<a class="btn btn-primary" href="{{url('order/payment')}}/{{$v['gid']}}">确认</a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="btn btn-danger" href="/order/index">取消</a>
				      </div>
				    </div>
				  </div>
				</div>
				@endforeach
			@endif
			</div>
<!-- 待付款 -->
			<div class="am-tab-panel am-fade" id="tab2">
			@if($data1)
				<div class="order-top">
					<div class="th th-item">
						商品
					</div>
					<div class="th th-price">
						名称
					</div>
					<div class="th th-number">
						价格
					</div>
					<div class="th th-operation">
						商品操作
					</div>
					<div class="th th-status">
						交易状态
					</div>
					<div class="th th-change">
						交易操作
					</div>
				</div>
			
				@foreach($data1 as $k => $v)
				<div class="order-main">
					<div class="order-list">
						<div class="order-status1">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{$v['ocode']}}</a></div>
								<span>下单时间：{{date('Y-m-d',$v['xtime'])}}</span>
							</div>
							<div class="order-content">
								<div class="order-left">
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="/goods/details/{{$v['gid']}}" class="J_MakePoint">
													<img src="{{url($v['gsmallpic'])}}" class="itempic J_ItemImg">
												</a>
											</div>
											<p style="margin-top:30px;">收货人:{{$v['name']}}&nbsp;&nbsp; 手机号:{{$v['phone']}}</p>
											<p>地址:{{$v['P2']}}&nbsp;&nbsp;{{$v['C2']}}&nbsp;&nbsp;{{$v['uaddr']}}</p>	
										</li>
										<li class="td td-price">
											<div class="item-price" style="margin-top:30px;">
												{{$v['gname']}}
											</div>
										</li>
										<li class="td td-number">
											<div class="item-number" style="margin-top:30px;">
												{{$v['gpic']}}
											</div>
										</li>
										<li class="td td-operation">
											<div class="item-operation" style="margin-top:30px;">
												<p class="order-info"><a href="javascript:;" onClick="delClick({{$v['gid']}});" >取消订单</a></p>	
											</div>
										</li>
									</ul>
								</div>
								<div class="order-right">
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status" style="margin-top:10px;">
												<p class="Mystatus">等待买家付款</p>
											</div>
										</li>
										<li class="td td-change">
											<!-- <a href="javascript:;" >
											<div class=".modal-backdrop.in">
												一键支付</div></a> -->				
										     <button type="button" class="btn btn-primary" style="margin-bottom:10px" data-toggle="modal" data-target="#createAlbum">
												  付款
												</button>
										</li>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade"  id="createAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					
				  <div class="modal-dialog" role="document" style="width:200px;">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h4 class="modal-title" id="myModalLabel">是否付款</h4>
				      </div>
				      <div class="modal-body">
				           <a class="btn btn-primary" href="{{url('order/payment')}}/{{$v['gid']}}">确认</a>
					      	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					      	<a class="btn btn-danger" href="/order/index">取消</a>
				      </div>
				    </div>
				  </div>
				</div>
				@endforeach
			@endif
			</div>



<!-- 待发货 -->
			<div class="am-tab-panel am-fade" id="tab3">
			@if($data2)
				<div class="order-top">
					<div class="th th-item">
						商品
					</div>
					<div class="th th-price">
						名称
					</div>
					<div class="th th-number">
						价格
					</div>
					<div class="th th-operation">
						商品操作
					</div>
					<div class="th th-status">
						交易状态
					</div>
					<div class="th th-change">
						交易操作
					</div>
				</div>
			
				@foreach($data2 as $k => $v)
				<div class="order-main">
					<div class="order-list">
						<div class="order-status2">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{$v['ocode']}}</a></div>
								<span>下单时间：{{date('Y-m-d',$v['xtime'])}}</span>
							</div>
							<div class="order-content">
								<div class="order-left">

									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="/goods/details/{{$v['gid']}}" class="J_MakePoint">
													<img src="{{url($v['gsmallpic'])}}" class="itempic J_ItemImg">
												</a>
											</div>
											<p style="margin-top:30px;">收货人:{{$v['name']}}&nbsp;&nbsp; 手机号:{{$v['phone']}}</p>
											<p>地址:{{$v['P2']}}&nbsp;&nbsp;{{$v['C2']}}&nbsp;&nbsp;{{$v['uaddr']}}</p>
										</li>
										<li class="td td-price">
											<div class="item-price" style="margin-top:23px;">
												{{$v['gname']}}
											</div>
										</li>
										<li class="td td-number">
											<div class="item-number" style="margin-top:23px;">
												{{$v['gpic']}}
											</div>
										</li>
										<li class="td td-operation">
											<div class="item-operation" style="margin-top:23px;">
												<a href="javascript:;" onclick="fund({{$v['oid']}})">退款</a>
											</div>
										</li>
									</ul>
								</div>
								<div class="order-right">
									
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status" style="margin-top:5px;">
												<p class="Mystatus">买家已付款</p>
											</div>
										</li>
										<li class="td td-change">
											<div class="am-btn am-btn-danger anniu">
												提醒发货</div>
										</li>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif
			</div>
<!-- 待收货 -->
			<div class="am-tab-panel am-fade" id="tab4">
			@if($data3)
				<div class="order-top">
					<div class="th th-item">
						商品
					</div>
					<div class="th th-price">
						名称
					</div>
					<div class="th th-number">
						价格
					</div>
					<div class="th th-operation">
						商品操作
					</div>
					<div class="th th-status">
						交易状态
					</div>
					<div class="th th-change">
						交易操作
					</div>
				</div>
			
				@foreach($data3 as $k => $v)
				<div class="order-main">
					<div class="order-list">
						<div class="order-status3">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{$v['ocode']}}</a></div>
								<span>下单时间：{{date('Y-m-d',$v['xtime'])}}</span>
								<!--    <em>店铺：小桔灯</em>-->
							</div>
							<div class="order-content">
								<div class="order-left">
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="/goods/details/{{$v['gid']}}" class="J_MakePoint">
													<img src="{{url($v['gsmallpic'])}}" class="itempic J_ItemImg">
												</a>
											</div>
											<p style="margin-top:30px;">收货人:{{$v['name']}}&nbsp;&nbsp; 手机号:{{$v['phone']}}</p>
											<p>地址:{{$v['P2']}}&nbsp;&nbsp;{{$v['C2']}}&nbsp;&nbsp;{{$v['uaddr']}}</p>
										</li>
										<li class="td td-price">
											<div class="item-price" style="margin-top:23px;">
												{{$v['gname']}}
											</div>
										</li>
										<li class="td td-number">
											<div class="item-number" style="margin-top:23px;">
												{{$v['gpic']}}
											</div>
										</li>
										<li class="td td-operation">
											<div class="item-operation" style="margin-top:23px;">
												<a href="javascript:;" onclick="fund({{$v['oid']}})">退款/退货</a>
											</div>
										</li>
									</ul>
								</div>
								<div class="order-right">
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status" style="margin-top:5px;">
												<p class="Mystatus">卖家已发货</p>
											</div>
										</li>
										<li class="td td-change">
											<div onclick="receipts({{$v['oid']}})" class="am-btn am-btn-danger anniu">
												确认收货</div>
										</li>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif
			</div>
<!-- 待评价 -->
			<div class="am-tab-panel am-fade" id="tab5">
			@if($data4)
				<div class="order-top">
					<div class="th th-item">
						商品
					</div>
					<div class="th th-price">
						名称
					</div>
					<div class="th th-number">
						价格
					</div>
					<div class="th th-operation">
						商品操作
					</div>
					<div class="th th-status">
						交易状态
					</div>
					<div class="th th-change">
						交易操作
					</div>
				</div>
			
				@foreach($data4 as $k => $v)
				<div class="order-main">
					<div class="order-list">
						<!--不同状态的订单	-->						
						<div class="order-status4">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{$v['ocode']}}</a></div>
								<span>成交时间：{{date('Y-m-d',$v['stime'])}}</span>
								<!--    <em>店铺：小桔灯</em>-->
							</div>
							<div class="order-content">
								<div class="order-left">
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="/goods/details/{{$v['gid']}}" class="J_MakePoint">
													<img src="{{url($v['gsmallpic'])}}" class="itempic J_ItemImg">
												</a>
											</div>
											<p style="margin-top:30px;">收货人:{{$v['name']}}&nbsp;&nbsp; 手机号:{{$v['phone']}}</p>
											<p>地址:{{$v['P2']}}&nbsp;&nbsp;{{$v['C2']}}&nbsp;&nbsp;{{$v['uaddr']}}</p>
										</li>
										<li class="td td-price" >
											<div class="item-price" style="margin-top:23px;">
												{{$v['gname']}}
											</div>
										</li>
										<li class="td td-number">
											<div class="item-number" style="margin-top:23px;">
												{{$v['gpic']}}
											</div>
										</li>
										<li class="td td-operation">
											<div class="item-operation" style="margin-top:23px;">
												<a href="javascript:;" onclick="fund({{$v['oid']}})">退款/退货</a>
											</div>
										</li>
									</ul>
								</div>
								<div class="order-right">
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status" style="margin-top:5px;">
												<p class="Mystatus">交易成功</p>
											</div>
										</li>
										<li class="td td-change">
											<a href="commentlist.html">
												<div class="am-btn am-btn-danger anniu">
													评价商品</div>
											</a>
										</li>
									</div>
								</div>
							</div>
						</div>


					</div>

				</div>
				@endforeach
			@endif
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
	//申请退货
	function fund(oid)
	{
		$.post("{{url('order/fund')}}/"+oid,{'_token':"{{csrf_token()}}"},function(msg)
			{
				//判断结果
				if(msg == 1){
					location.href = "{{url('order/refund')}}";
				}else{
					location.href = location.href;
					layer.msg('申请退货失败', {icon: 5});
				}
			});
	}
	//确认收货
	function receipts(oid)
	{	
		$.post("{{url('order/receipt')}}/"+oid,{'_token':"{{csrf_token()}}"},function(msg)
			{
				//判断结果
				if(msg == 1){
					location.href = location.href;
					layer.msg('收货成功', {icon: 6});
				}else{
					location.href = location.href;
					layer.msg('已收货或正在退货', {icon: 5});
				}
			});
	}
	//删除订单
	function delClick(huaid)
	{
		//确认框
		layer.confirm('确认取消？', {
			btn: ['确认','取消'] //按钮
		}, function(){
			//发送删除信息
			$.post("{{url('order/del')}}/"+huaid,{'_token':"{{csrf_token()}}"},function(res){
					if(res == 1){
						location.href = location.href;
						layer.msg('取消订单成功', {icon: 6});
					}else{
						location.href = location.href;
						layer.msg('取消订单失败', {icon: 5});
					}
			});
		}, function(){
		});
	}
</script>
@endsection