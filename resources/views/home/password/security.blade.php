@extends('home/layout/detil ')
@section('content')

<div class="user-safety">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
	</div>
	<hr/>

	<!--头像 -->
	<div class="user-infoPic">

		<div class="filePic">
			<img class="am-circle am-img-thumbnail" src="{{url($data['upic'])}}" alt="" />
		</div>

		<p class="am-form-help">头像</p>

		<div class="info-m">
			<div><b>用户名：<i>{{session('user')['uname']}}</i></b></div>
			<div class="u-level">
				<span class="rank r2">
		             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
	            </span>
			</div>
			<div class="u-safety">
				<a href="safety.html">
				 账户安全
				<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
				</a>
			</div>
		</div>
	</div>

	<div class="check">
		<ul>
			<li>
				<i class="i-safety-lock"></i>
				<div class="m-left">
					<div class="fore1">登录密码</div>
					<div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
				</div>
				<div class="fore3">
					<a href="{{url('pass/modify')}}">
						<div class="am-btn am-btn-secondary">修改</div>
					</a>
				</div>
			</li>
			<li>
				<i class="i-safety-iphone"></i>
				<div class="m-left">
					<div class="fore1">手机验证</div>
					<div class="fore2"><small>您验证的手机：{{ substr_replace(session('user')['phone'],'*****',3,5)}}若已丢失或停用，请立即更换</small></div>
				</div>
				<div class="fore3">
					<a href="{{url('pass/editphone')}}">
						<div class="am-btn am-btn-secondary">换绑</div>
					</a>
				</div>
			</li>
			</li>
		</ul>
	</div>

</div>
@endsection