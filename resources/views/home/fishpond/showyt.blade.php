@extends('home.layout.gdetails')
@section('content')
<div class="main-wrap">

	<div class="user-news">

		<!--标题 -->
		<div class="am-cf am-padding">
			<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">鱼塘列表</strong> </div>
			<form action="{{url('/fishpond/list')}}" method='get'>
				<input type="submit" value="搜索" style="width:50px;height:35px;border:1px solid #ccc;float:right;margin-left:10px;background:orange;text-align:center;">
				<input type="text" name='search' value="" placeholder="鱼塘搜索" style="height:35px;border:1px solid #ccc;float:right;">
			</form>
		</div>
		<hr/>
		<div class="am-tabs am-tabs-d2" data-am-tabs>
			<div class="am-tabs-bd">
				<div class="am-tab-panel am-fade am-in am-active" id="tab1">
				
					<div class="news-day">
					
						<!--鱼塘列表 -->
						@if(!empty($data))
							@foreach($data as $v)
						<div style="float:left;margin-left:10px">
							<h6 class="s-msg-bar"><span class="s-name">{{$v['yname']}}</span></h6>
							<div class="s-msg-content i-msg-downup-wrap">
								<div class="i-msg-downup-con">
									<a class="i-markRead" target="_blank" href="{{url('/fishpond/index?yid=').$v['yid']}}">
										<img src="{{asset('/uploads/fishpond/').'/'.$v['ytpic']}}" style="width:300px;height:180px;">
										<p class="s-main-content">
											{{$v['description']}}
										</p>
										<p class="s-row s-main-content">
											<a href="{{url('/fishpond/index?yid=').$v['yid']}}">
											点击进入 <i class="am-icon-angle-right"></i>
											</a>
										</p>
									</a>
								</div>
							</div>
						</div>

						@endforeach
					@endif
					</div>

				</div>
			</div>
		</div>
<div>
	{!! $data->appends($arr)->render() !!}
</div>
	</div>

</div>

@endsection