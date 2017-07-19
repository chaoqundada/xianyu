@extends('home/layout/detil ')
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
			<span class="new-option-r" onclick="moren({{$v['huaid']}})"><i class="am-icon-check-circle"></i>默认地址</span>
			<p class="new-tit new-p-re">
				<span class="new-txt">{{$v['name']}}</span>
				<span class="new-txt-rd2">{{ substr_replace($v['phone'],'*****',3,5)}}</span>
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
				<a href="javascript:void(0);" onClick="delClick({{$v['huaid']}});"><i class="am-icon-trash"></i>删除</a>
			</div>
		</li>
			@endforeach
		@endif
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
						<span class="span1" style="color:red;margin-left:105px;">
							@if($errors -> has('name'))
								收货人必填
							@endif
						</span>
					</div>

					<div class="am-form-group">
						<label for="user-phone"  class="am-form-label">手机号码</label>
						<div class="am-form-content">
							<input id="user-phone" name="phone" placeholder="手机号必填" type="text">
						</div>
						<span class="span2" style="color:red;margin-left:105px;">
							@if($errors -> has('phone'))
								手机号必填
							@endif
						</span>
					</div>
					<div class="am-form-group">
						<label for="user-address" class="am-form-label">所在地</label>
						<div class="am-form-content address">
							<select name="P2" id='p2'></select><select id='c2' name="C2"></select><br>
							<span style="color:red;margin-left:105px;">
						</span>
						</div>
					</div>

					<div class="am-form-group">
						<label for="user-intro" class="am-form-label">详细地址</label>
						<div class="am-form-content">
							<textarea class="" name="uaddr" id='uaddr' rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
							<small class="span3">
								@if($errors -> has('phone'))
									<span style="color:red;">
										地址必填
									</span>
								@else
									100字以内写出你的详细地址...
								@endif
							</small>
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
	var s1 = s2 = s3 = false;
	//收货人
	var uname = $('input[name="name"]');
	//失去焦点
	uname.blur(function()
	{
		//判断是否有值结果
		if(uname.val()){
            $('.span1').text(' ').css('color','red');
			s1 = true;
		}else{
			$('.span1').text('收货人必填').css('color','red');
			s1 = false;
		}
	});	
	
	//手机号
	var tel = $('input[name="phone"]');
	//失去焦点
	tel.blur(function()
	{
		//正则验证
		var preg = /^1[3,4,5,7,8]\d{9}$/;
		//判断验证结果
		if(preg.test(tel.val())){
            $('.span2').text(' ').css('color','red');
			s2 = true;
		}else{
			$('.span2').text('手机号不正确').css('color','red');
			s2 = false;
		}
	});	

	//收货地址
	var uaddr = $('#uaddr');
	//失去焦点
	uaddr.blur(function()
	{	
		//判断是否有值结果
		if(uaddr.val()){
            $('.span3').text(' ').css('color','red');
			s3 = true;
		}else{
			$('.span3').text('收货地址必填').css('color','red');
			s3 = false;
		}
	});	
	$('form').submit(function()
		{
			if(s1 && s2 && s3){
				return true;
			}
			return false;
		});
	//省/市下拉列表
	new PCAS("P2","C2","北京市");
	$(document).ready(function() 
	{							
		$(".new-option-r").click(function() {
			$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
		});
		var $ww = $(window).width();
		if($ww>640) {
			$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
		}
	});
	//修改默认收货地址
	function moren(huaid)
	{
		$.post("{{url('addr/status')}}/"+huaid,{'uid':"{{session('user')['uid']}}",'_token':"{{csrf_token()}}"},function(msg)
			{
				//判断结果
				if(msg == 1){
					location.href = location.href;
				}else{
					location.href = location.href;
				}
			});
	}
	//删除地址
	function delClick(huaid)
	{
		//确认框
		layer.confirm('确认删除？', {
			btn: ['确认','取消'] //按钮
		}, function(){
			//发送删除信息
			$.post("{{url('addr/delete')}}/"+huaid,{'_token':"{{csrf_token()}}"},function(res){
					if(res == 1){
						location.href = location.href;
						layer.msg('删除成功', {icon: 6});
					}else{
						location.href = location.href;
						layer.msg('删除失败', {icon: 5});
					}
			});
		}, function(){
		});
	}
</script>

<div class="clear"></div>
@endsection