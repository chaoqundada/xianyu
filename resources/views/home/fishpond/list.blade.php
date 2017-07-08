@extends('home.layout.fishpondcom')
@section('content')
    <div class="main-wrap">

        <div class="user-info">
            <!--标题 -->
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">鱼塘列表</strong> / <small>List Of&nbsp;Fishpond</small></div>
            </div>
            <hr/>

            <!--头像 -->
            <div class="user-infoPic">

                <div class="filePic">
                    <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                    <img class="am-circle am-img-thumbnail" src="/homes/images/getAvatar.do.jpg" alt="" />
                </div>

                <p class="am-form-help">头像</p>

                <div class="info-m">
                    <div><b>用户名：<i>小叮当</i></b></div>
                    <div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="/homes/#">铜牌会员</a>
						            </span>
                    </div>
                    <div class="u-safety">
                        <a href="/homes/safety.html">
                            账户安全
                            <span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
                        </a>
                    </div>
                </div>
            </div>

            <!--鱼塘列表 -->
            列表

        </div>

    </div>
@endsection