@extends('home/layout/detil ')
@section('content')
	
<div class="user-order">

	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退换货管理</strong> / <small>Change</small></div>
	</div>
	<hr>

	<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">
		<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
			<li class="am-active"><a href="#tab1">退款管理</a></li>
			<li class=""><a href="#tab2">售后管理</a></li>
		</ul>

		<div class="am-tabs-bd" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
			@if($data5)
				@foreach($data5 as $k => $v)
<!-- 退款管理 -->
			<div class="am-tab-panel am-fade am-active am-in" id="tab1">
				<div class="order-top">
					<div class="th th-item">
						商品
					</div>
					<div class="th th-orderprice th-price">
						交易金额
					</div>
					<div class="th th-changeprice th-price">
						退款金额
					</div>
					<div class="th th-status th-moneystatus">
						交易状态
					</div>
				</div>

				<div class="order-main">
					<div class="order-list">
						<div class="order-title">
							<div class="dd-num">订单编号：<a href="javascript:;">{{$v['ocode']}}</a></div>
							<span>申请时间：{{date('Y-m-d',$v['rtime'])}}</span>
							<!--    <em>店铺：小桔灯</em>-->
						</div>
						<div class="order-content">
							<div class="order-left">
								<ul class="item-list">
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" class="J_MakePoint">
												<img src="{{url($v['gsmallpic'])}}" class="itempic J_ItemImg">
											</a>
										</div>
									</li>
									<ul class="td-changeorder">
										<li class="td td-orderprice">
											<div class="item-orderprice">
												<span>交易金额：</span>{{$v['gpic']}}
											</div>
										</li>
										<li class="td td-changeprice">
											<div class="item-changeprice">
												<span>退款金额：</span>{{$v['gpic']}}
											</div>
										</li>
									</ul>
									<div class="clear"></div>
								</ul>
								<div class="change move-right">
									<li class="td td-moneystatus td-status">
										<div class="item-status">
											<p class="Mystatus">退款中</p>
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
		@if($data6)
				@foreach($data6 as $k => $v)
<!-- 售后管理 -->
			<div class="am-tab-panel am-fade" id="tab2">
				<div class="order-top">
					<div class="th th-item">
						商品
					</div>
					<div class="th th-orderprice th-price">
						交易金额
					</div>
					<div class="th th-changeprice th-price">
						退款金额
					</div>
					<div class="th th-status th-moneystatus">
						交易状态
					</div>
				</div>

				<div class="order-main">
					<div class="order-list">
						<div class="order-title">
							<div class="dd-num">订单编号：<a href="javascript:;">{{$v['ocode']}}</a></div>
							<span>退款完成时间：{{date('Y-m-d',$v['ttime'])}}</span>
							<!--    <em>店铺：小桔灯</em>-->
						</div>
						<div class="order-content">
							<div class="order-left">
								<ul class="item-list">
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" class="J_MakePoint">
												<img src="{{url($v['gsmallpic'])}}" class="itempic J_ItemImg">
											</a>
										</div>
									</li>

									<ul class="td-changeorder">
										<li class="td td-orderprice">
											<div class="item-orderprice">
												<span>交易金额：</span>{{$v['gpic']}}
											</div>
										</li>
										<li class="td td-changeprice">
											<div class="item-changeprice">
												<span>退款金额：</span>{{$v['gpic']}}
											</div>
										</li>
									</ul>
									<div class="clear"></div>
								</ul>

								<div class="change move-right">
									<li class="td td-moneystatus td-status">
										<div class="item-status">
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
@endsection