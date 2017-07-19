@extends('home/layout/detil')
@section('content')
<div class="wrap-left">
	<div class="wrap-list">		
		<!--收藏夹 -->
		<div class="you-like">
			<div class="s-bar">我的收藏
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

@endsection