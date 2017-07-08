@extends('home.layout.fishpondcom')

@section('content')
    <script language="javascript" src="/homes/js/PCASClass.js"></script>


            <div class="main-wrap">

                <div class="user-info">
                    <!--标题 -->
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">鱼塘申请</strong> / <small>Apply for&nbsp;Fishpond</small></div>
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

                    <!--个人信息 -->
                    <div class="info-main">
                        @if(session('error'))
                            {{session('error')}}
                        @endif
                        <form class="am-form am-form-horizontal" action="/myfishpond/doadd" method="POST" enctype="multipart/form-data">

                            <div class="am-form-group">
                                <label for="yname" class="am-form-label">鱼塘名称</label>
                                <div class="am-form-content">
                                    <input type="text" name="yname" id="yname" placeholder="鱼塘名称">
                                    <script>
                                        $(function(){
                                            $('#yname').blur(function () {
                                                $.get('/myfishpond/ajaxyname',{yname:$(this).val()},function (msg) {
                                                    if(msg == 1){
                                                        alert('该鱼塘名称已经存在');
                                                    }
                                                });
                                            });
                                        });

                                    </script>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="ytpic" class="am-form-label">鱼塘封面</label>
                                <div class="am-form-content">
                                    <input type="file" name="ytpic" id="ytpic">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-email" class="am-form-label">地域</label>
                                <div class="am-form-content">
                                    <select name="P2" style="width:250px;float:left"></select><select name="C2" style="width:250px"></select><br>
                                    <script>
                                        new PCAS("P2","C2","北京市");
                                    </script>
                                </div>
                            </div>

                            <div class="info-btn">
                                {{csrf_field()}}
                                <input class="am-btn am-btn-danger" type="submit" value="申请鱼塘">
                            </div>

                        </form>
                    </div>

                </div>

            </div>





@endsection
