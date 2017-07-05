@extends('home/layout/detil')
@section('content')

<div class="user-address" >
	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
	</div>
	<hr/>
	<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
		@if($data)
			@foreach($data as $k => $v)
		<li class="user-addresslist @if($v['huasttic'] == 1) defaultAddr @endif" style="margin-top:10px;">
			<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
			<p class="new-tit new-p-re">
				<span class="new-txt">{{$v['name']}}</span>
				<span class="new-txt-rd2">{{$v['phone']}}</span>
			</p>
			<div class="new-mu_l2a new-p-re">
				<p class="new-mu_l2cw">
					<span class="title">地址：</span>
					<span class="province">{{$v['P2']}}</span>
					<span class="city">{{$v['C2']}}</span>
					<span class="street">{{$v['uaddr']}}</span></p>
			</div>
			<div class="new-addr-btn">
				<a href="/addr/edit/{{$v['huaid']}}"><i class="am-icon-edit"></i>编辑</a>
				<span class="new-addr-bar">|</span>
				<a href="javascript:void(0);" onClick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
			</div>
		</li>
			@endforeach
		@endif
		<li class="user-addresslist " style="margin-top:10px;">
			<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
			<p class="new-tit new-p-re">
				<span class="new-txt">小叮当</span>
				<span class="new-txt-rd2">159****1622</span>
			</p>
			<div class="new-mu_l2a new-p-re">
				<p class="new-mu_l2cw">
					<span class="title">地址：</span>
					<span class="province">湖北</span>省
					<span class="city">武汉</span>市
					<span class="dist">洪山</span>区
					<span class="street">雄楚大道666号(中南财经政法大学)</span></p>
			</div>
			<div class="new-addr-btn">
				<a href="#"><i class="am-icon-edit"></i>编辑</a>
				<span class="new-addr-bar">|</span>
				<a href="javascript:void(0);" onClick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
			</div>
		</li>
		<li class="user-addresslist " style="margin-top:10px;">
			<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
			<p class="new-tit new-p-re">
				<span class="new-txt">小叮当</span>
				<span class="new-txt-rd2">159****1622</span>
			</p>
			<div class="new-mu_l2a new-p-re">
				<p class="new-mu_l2cw">
					<span class="title">地址：</span>
					<span class="province">湖北</span>省
					<span class="city">武汉</span>市
					<span class="dist">洪山</span>区
					<span class="street">雄楚大道666号(中南财经政法大学)</span></p>
			</div>
			<div class="new-addr-btn" style="margin-top:10px;">
				<a href="#"><i class="am-icon-edit"></i>编辑</a>
				<span class="new-addr-bar">|</span>
				<a href="javascript:void(0);" onClick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
			</div>
		</li>
		<li class="user-addresslist " style="margin-top:10px;">
			<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
			<p class="new-tit new-p-re">
				<span class="new-txt">小叮当</span>
				<span class="new-txt-rd2">159****1622</span>
			</p>
			<div class="new-mu_l2a new-p-re">
				<p class="new-mu_l2cw">
					<span class="title">地址：</span>
					<span class="province">湖北</span>省
					<span class="city">武汉</span>市
					<span class="dist">洪山</span>区
					<span class="street">雄楚大道666号(中南财经政法大学)</span></p>
			</div>
			<div class="new-addr-btn">
				<a href=""><i class="am-icon-edit"></i>编辑</a>
				<span class="new-addr-bar">|</span>
				<a href="javascript:void(0);" onClick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
			</div>
		</li>

		<li class="user-addresslist" style="margin-top:10px;">
			<span class="new-option-r"><i class="am-icon-check-circle"></i>设为默认</span>
			<p class="new-tit new-p-re">
				<span class="new-txt">小叮当</span>
				<span class="new-txt-rd2">159****1622</span>
			</p>
			<div class="new-mu_l2a new-p-re">
				<p class="new-mu_l2cw">
					<span class="title">地址：</span>
					<span class="province">湖北</span>省
					<span class="city">武汉</span>市
					<span class="dist">洪山</span>区
					<span class="street">雄楚大道666号(中南财经政法大学)</span></p>
			</div>
			<div class="new-addr-btn">
				<a href="#"><i class="am-icon-edit"></i>编辑</a>
				<span class="new-addr-bar">|</span>
				<a href="javascript:void(0);" onClick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
			</div>
		</li>
		<li class="user-addresslist" style="margin-top:10px;">
			<span class="new-option-r"><i class="am-icon-check-circle"></i>设为默认</span>
			<p class="new-tit new-p-re">
				<span class="new-txt">小叮当</span>
				<span class="new-txt-rd2">159****1622</span>
			</p>
			<div class="new-mu_l2a new-p-re">
				<p class="new-mu_l2cw">
					<span class="title">地址：</span>
					<span class="province">湖北</span>省
					<span class="city">武汉</span>市
					<span class="dist">洪山</span>区
					<span class="street">雄楚大道666号(中南财经政法大学)</span></p>
			</div>
			<div class="new-addr-btn">
				<a href="#"><i class="am-icon-edit"></i>编辑</a>
				<span class="new-addr-bar">|</span>
				<a href="javascript:void(0);" onClick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
			</div>
		</li>
	</ul>
	<div class="clear"></div>
	<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
	<!--例子-->
	<div class="am-modal am-modal-no-btn" id="doc-modal-1">

		<div class="add-dress">

			<!--标题 -->
			<div class="am-cf am-padding">
				<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
			</div>
			<hr/>

			<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;margin-left:80px;">
				<form method="post" action="{{url('addr/insert')}}" class="am-form am-form-horizontal" enctype="multipart/form-data">
					<div class="am-form-group">
						<label for="user-name" class="am-form-label">收货人</label>
						<div class="am-form-content">
							<input type="text" name='name' id="user-name" placeholder="收货人">
						</div>
					</div>

					<div class="am-form-group">
						<label for="user-phone"  class="am-form-label">手机号码</label>
						<div class="am-form-content">
							<input id="user-phone" name="phone" placeholder="手机号必填" type="text">
						</div>
					</div>
					<div class="am-form-group">
						<label for="user-address" class="am-form-label">所在地</label>
						<div class="am-form-content address">
							<select name="P2"></select><select name="C2"></select><br>
						</div>
					</div>

					<div class="am-form-group">
						<label for="user-intro" class="am-form-label">详细地址</label>
						<div class="am-form-content">
							<textarea class="" name="uaddr" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
							<small>100字以内写出你的详细地址...</small>
						</div>
					</div>
					{{csrf_field()}}
					<div class="am-form-group" style="margin-top:50px;">
						<div class="am-u-sm-9 am-u-sm-push-3">
							<input type="submit" class="am-btn am-btn-danger" value="保存">
							<input type="reset" class="am-close am-btn am-btn-danger" value="取消">
						</div>
					</div>
				</form>
			</div>

		</div>

	</div>

</div>

<script type="text/javascript">
	new PCAS("P2","C2","北京市");
	$(document).ready(function() {							
		$(".new-option-r").click(function() {
			$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
		});
		
		var $ww = $(window).width();
		if($ww>640) {
			$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
		}
		
	})
</script>

<div class="clear"></div>
@endsection