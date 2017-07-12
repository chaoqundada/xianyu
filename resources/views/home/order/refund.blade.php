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
					<div class="th th-change th-changebuttom">
						交易操作
					</div>
				</div>

				<div class="order-main">
					<div class="order-list">
						<div class="order-title">
							<div class="dd-num">退款编号：<a href="javascript:;">1601430</a></div>
							<span>申请时间：2015-12-20</span>
							<!--    <em>店铺：小桔灯</em>-->
						</div>
						<div class="order-content">
							<div class="order-left">
								<ul class="item-list">
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" class="J_MakePoint">
												<img src="/homes/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
											</a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#">
													<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
													<p class="info-little">颜色：12#川南玛瑙
														<br>包装：裸装 </p>
												</a>
											</div>
										</div>
									</li>

									<ul class="td-changeorder">
										<li class="td td-orderprice">
											<div class="item-orderprice">
												<span>交易金额：</span>72.00
											</div>
										</li>
										<li class="td td-changeprice">
											<div class="item-changeprice">
												<span>退款金额：</span>70.00
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
								<li class="td td-change td-changebutton">
									<a href="record.html">
									<div class="am-btn am-btn-danger anniu">
										钱款去向</div>
									</a>
								</li>

							</div>
						</div>
					</div>

				</div>

			</div>
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
					<div class="th th-change th-changebuttom">
						交易操作
					</div>
				</div>

				<div class="order-main">
					<div class="order-list">
						<div class="order-title">
							<div class="dd-num">退款编号：<a href="javascript:;">1601430</a></div>
							<span>申请时间：2015-12-20</span>
							<!--    <em>店铺：小桔灯</em>-->
						</div>
						<div class="order-content">
							<div class="order-left">
								<ul class="item-list">
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" class="J_MakePoint">
												<img src="/homes/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
											</a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#">
													<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
													<p class="info-little">颜色：12#川南玛瑙
														<br>包装：裸装 </p>
												</a>
											</div>
										</div>
									</li>

									<ul class="td-changeorder">
										<li class="td td-orderprice">
											<div class="item-orderprice">
												<span>交易金额：</span>72.00
											</div>
										</li>
										<li class="td td-changeprice">
											<div class="item-changeprice">
												<span>退款金额：</span>70.00
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
								<li class="td td-change td-changebutton">
                                    <a href="record.html">
									    <div class="am-btn am-btn-danger anniu">
										钱款去向</div>
									</a>
								</li>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


@endsection