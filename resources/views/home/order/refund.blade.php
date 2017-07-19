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
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退换货管理</strong> / <small>Change</small></div>		
	</div>
	<hr>
	<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">

		<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
			<li class="am-active"><a href="#tab1">退款管理</a></li>
			<li class=""><a href="#tab2">售后管理</a></li>
		</ul>

		<div class="am-tabs-bd" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
<!-- 退款管理 -->
	
			<div class="am-tab-panel am-fade am-active am-in" id="tab1">
			@if($data5)
				<div class="order-top">
					<div class="th th-item">
						商品
					</div>
					<div class="th th-price">
						名称
					</div>
					<div class="th th-price">
						交易金额
					</div>
					<div class="th th-operation">
						退款金额
					</div>
					<div class="th th-status">
						交易状态
					</div>
				</div>
				@foreach($data5 as $k => $v)
				<div class="order-main">
					<div class="order-list">
						<!--不同状态订单-->
						<div class="order-status3">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{$v['ocode']}}</a></div>
								<span>申请时间：{{date('Y-m-d',$v['rtime'])}}</span>
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
												{{$v['gpic']}}
											</div>
										</li>
									</ul>
								</div>
								<div class="order-right" >
									<div class="move-right">
										<li class="td td-status" style="margin-left:50px;">
											<div class="item-status" style="margin-top:5px;">
												<p class="Mystatus" style="color:red">退款中</p>
											</div>
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
			@if($data6)
				<div class="order-top">
					<div class="th th-item">
						商品
					</div>
					<div class="th th-price">
						名称
					</div>
					<div class="th th-number">
						交易金额
					</div>
					<div class="th th-operation">
						退款金额
					</div>
					<div class="th th-status">
						交易状态
					</div>
				</div>
			@foreach($data6 as $k => $v)
				<div class="order-main">
					<div class="order-list">
						<div class="order-status1">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{$v['ocode']}}</a></div>
								<span>退款完成时间：{{date('Y-m-d',$v['ttime'])}}</span>
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
												{{$v['gpic']}}	
											</div>
										</li>
									</ul>
								</div>
								<div class="order-right">
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status" style="margin-top:10px;">
												<p class="Mystatus">退款成功</p>
											</div>
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
@endsection