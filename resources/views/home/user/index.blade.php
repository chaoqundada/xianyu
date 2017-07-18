@extends('home/layout/detil')
@section('content')
<div class="wrap-left">
	<div class="wrap-list">
		<div class="m-user">
			<!--个人信息 -->
			<div class="m-bg"></div>
			<div class="m-userinfo">
				<div class="m-baseinfo">
					<a href="javascript:;">
						<img src="{{url($data['upic'])}}">
					</a>
					<em class="s-name">({{session('user')['uname']}})<span class="vip1"></em>
					<div class="s-prestige am-btn am-round">
						</span>会员福利</div>
				</div>
				<div class="m-right">
					<div class="m-new">
						<a href="news.html"><i class="am-icon-bell-o"></i>消息</a>
					</div>
					<div class="m-address">
						<a href="{{url('addr/add')}}" class="i-trigger">我的收货地址</a>
					</div>
				</div>
			</div>
		</div>
		<div class="box-container-bottom"></div>

		<!--订单 -->
		<div class="m-order">
			<div class="s-bar">
				<i class="s-icon"></i>我的订单
				<a class="i-load-more-item-shadow" href="{{url('order/index')}}">全部订单</a>
			</div>
			<ul>
				<li><a href="{{url('order/index')}}"><i><img src="/homes/images/pay.png"/></i><span>待付款<em class="m-num">{{$order[1]}}</em></span></a></li>
				<li><a href="{{url('order/index')}}"><i><img src="/homes/images/send.png"/></i><span>待发货<em class="m-num">{{$order[2]}}</em></span></a></li>
				<li><a href="{{url('order/index')}}"><i><img src="/homes/images/receive.png"/></i><span>待收货<em class="m-num">{{$order[3]}}</em></span></a></li>
				<li><a href="{{url('order/index')}}"><i><img src="/homes/images/comment.png"/></i><span>待评价<em class="m-num">{{$order[4]}}</em></span></a></li>
				<li><a href="{{url('order/index')}}"><i><img src="/homes/images/refund.png"/></i><span>退换货<em class="m-num">{{$order[5]}}</em></span></a></li>
			</ul>
		</div>
		<!--收藏夹 -->
		<div class="you-like">
			<div class="s-bar">我的收藏
				<a class="i-load-more-item-shadow" href="{{url('order/coll')}}">全部收藏</a>
			</div>
			<div class="s-content">
			@if($coll)
				@foreach($coll as $k => $v)
				<!-- 商品 -->
				<div class="s-item-wrap">
					<div class="s-item">
						<div class="s-pic">
							<a href="/goods/details/{{$v['gid']}}" class="s-pic-link">
								<img src="{{url($v['gsmallpic'])}}" class="s-pic-img s-guess-item-img" style="height:185px;">
							</a>
						</div>
						<div class="s-price-box">
							<span class="s-price"><em class="s-price-sign">名称</em><em class="s-value">{{$v['gname']}}</em></span>
							<span class="s-price-sign"><em class="s-price-sign">&nbsp;&nbsp;&nbsp;&nbsp;¥</em><em class="s-value">{{$v['gpic']}}</em></span>
						</div>
					</div>
				</div>
				@endforeach
			@endif
			</div>
		</div>
	</div>
</div>
<div class="wrap-right">
	<!-- 日历-->
	<div class="day-list">
		<div class="s-bar">
			<a class="i-history-trigger s-icon" href="#"></a>我的日历
			<a class="i-setting-trigger s-icon" href="#"></a>
		</div>
		<div class="s-care s-care-noweather">
			<div class="s-date">
				<em id="em"></em>
				<span id="span1"></span>
				<span id="span2"></span>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function()
			{
				var date = new Date();
				//获取几号
				var hao = date.getDate();
				
				$('#em').text(hao);
				//获取星期
				switch(date.getDay()){
					case 0:
						$('#span1').text('星期日');
						break;
					case 1:
						$('#span1').text('星期一');
						break;
					case 2:
						$('#span1').text('星期二');
						break;
					case 3:
						$('#span1').text('星期三');
						break;
					case 4:
						$('#span1').text('星期四');
						break;
					case 5:
						$('#span1').text('星期五');
						break;
					case 6:
						$('#span1').text('星期六');
						break;
				}
				//获取月份
				var month = date.getMonth()+1;
				//获取年份
				var year = date.getFullYear();
				$('#span2').text(year+'.'+month);
 			});
	</script>
	<!--新品 -->
	<div class="new-goods">
		<div class="s-bar">
			<i class="s-icon"></i>今日新品
			<a class="i-load-more-item-shadow">15款新品</a>
		</div>
		<div class="new-goods-info">
			<a class="shop-info" href="#" target="_blank">
				<div class="face-img-panel">
					<img src="/homes/images/imgsearch1.jpg" alt="">
				</div>
				<span class="new-goods-num ">4</span>
				<span class="shop-title">剥壳松子</span>
			</a>
			<a class="follow " target="_blank">关注</a>
		</div>
	</div>

	<!--热卖推荐 -->
	<div class="new-goods">
		<div class="s-bar">
			<i class="s-icon"></i>热卖推荐
		</div>
		<div class="new-goods-info">
			<a class="shop-info" href="#" target="_blank">
				<div >
					<img src="/homes/images/imgsearch1.jpg" alt="">
				</div>
                <span class="one-hot-goods">￥9.20</span>
			</a>
		</div>
	</div>

</div>

@endsection