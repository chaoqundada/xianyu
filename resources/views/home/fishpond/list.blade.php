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
                    <div><b>用户名：<i>{{session('user')['uname']}}</i></b></div>
                    <div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="/homes/#">金牌会员</a>
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
            <div id="search" style="margin-bottom: 40px;">
                <form class="form-inline" method="get">
                    <div class="form-group">
                        <label for="exampleInputEmail2">鱼塘名称&nbsp;&nbsp;</label>
                        <input type="text" value="{{$keywords or ''}}" name="keywords" class="form-control" id="exampleInputEmail2" placeholder="请输入鱼塘名称">
                    </div>
                    <input type="submit" class="btn btn-success" value="搜索">
                </form>
            </div>
            <!--鱼塘列表 -->
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>鱼塘名称</th>
                    <th>鱼塘等级</th>
                    <th>鱼塘封面</th>
                    <th>用户数</th>
                    <th>鱼塘状态</th>
                    <th>鱼塘所在地</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($yts as $yt)
                    <tr>
                        <th scope="row">{{$yt['yid']}}</th>
                        <td>{{$yt['yname']}}</td>
                        <td>{{$yt['yrank']}}</td>
                        <td><img src="{{url('/uploads/fishpond/')}}/{{$yt['ytpic']}}" alt="" name="pic" id="pic" style="height: 40px" ></td>
                        <td>{{$yt['yatt']}}</td>
                        <td>{{$status[$yt['ystatic']]}}</td>
                        <td>{{$yt['sheng']}} {{$yt['shi']}}</td>
                        <td><a href="{{}}">编辑</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(!empty($keywords))
                {!! $yts->appends(['keywords' => $keywords])->render() !!}
            @else
                {!! $yts->render() !!}
            @endif
        </div>

    </div>
@endsection