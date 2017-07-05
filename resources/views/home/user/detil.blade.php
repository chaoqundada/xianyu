@extends('home/layout/detil')
@section('content')
<div class="user-info">
	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small></small></div>
	</div>
	<hr>

	<!--头像 -->
	<div class="user-infoPic">

		<div class="filePic">
			<input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
			<img class="am-circle am-img-thumbnail" src="{{url($data['upic'])}}" alt="">
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

	<!--个人信息 -->
	<div class="info-main">
		<form class="am-form am-form-horizontal" method="post" action="{{url('user/dodetil')}}" enctype="multipart/form-data">
			<!-- 邮箱 -->
			<div class="am-form-group">
				<label for="user-email" class="am-form-label">邮件</label>
				<div class="am-form-content">
					<input id="user-email" name='email' value="{{$data['email']}}" placeholder="邮箱" type="email">

				</div>
			</div>
			<!-- 头像 -->
			<div class="am-form-group">
				<label for="user-email" class="am-form-label">用户头像</label>
				<div class="am-form-content">
					<input id="user-email" name='upic' value="{{$data['upic']}}" placeholder="Email" type="file">
				</div>
			</div>
			<!-- 性别 -->
			<div class="am-form-group">
				<label class="am-form-label">性别</label>
				<div class="am-form-content sex">
					<label class="am-radio-inline">
						<input type="radio" name="sex" value="1" data-am-ucheck="" class="am-ucheck-radio" @if($data['sex'] == 1) checked @endif>
						<span class="am-ucheck-icons">
							<i class="am-icon-unchecked"></i><i class="am-icon-checked"></i>
						</span> 男
					</label>
					<label class="am-radio-inline">
						<input type="radio" name="sex" value="2" data-am-ucheck="" class="am-ucheck-radio" @if($data['sex'] == 2) checked @endif>
						<span class="am-ucheck-icons">
							<i class="am-icon-unchecked"></i><i class="am-icon-checked"></i>
						</span> 女
					</label>
				</div>
			</div>
			<!-- 生日 -->
			<div class="am-form-group">
				<label for="user-email"  class="am-form-label">生日</label>
				<div class="am-form-content">
					<input id="user-email" name='borthday' value="{{$data['borthday']}}" placeholder="生日/ 如9月10日" type="text">

				</div>
			</div>
			<!-- 年龄 -->
			<div class="am-form-group">
				<label for="user-email" class="am-form-label">年龄</label>
				<div class="am-form-content">
					<input id="user-email" name='age' value="{{$data['age']}}" placeholder="年龄" type="text">

				</div>
			</div>
			<!-- 常住地址 -->
			<div class="am-form-group">
				<label for="user-email" class="am-form-label">常住地址</label>
				<div class="am-form-content">
					<input id="user-email" name='addr' value="{{$data['addr']}}" placeholder="常住地址" type="text">
				</div>
			</div>
			{{csrf_field()}}
			<div class="info-btn" >
					<input type="submit"  value="保存修改">
			</div>
		</form>
	</div>

</div>
@endsection