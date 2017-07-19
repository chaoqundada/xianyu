<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>公告页面</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
</head>
<body>
@include('home.layout.header')
<div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
    <div class="nav-cont">
        <ul>
            @if(\Illuminate\Support\Facades\DB::table('nav')->get())
                @foreach(\Illuminate\Support\Facades\DB::table('nav')->get() as $k=>$v)
                    <li class="index"><a href="{{$v['nlink']}}">{{$v['ntitle']}}</a></li>
                @endforeach
            @endif
        </ul>
        <div class="nav-extra">
            <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
            <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
        </div>
    </div>
</div>
<b class="line"></b>
<!--文章 -->
<div class="am-g am-g-fixed blog-g-fixed bloglist">
    <div class="am-u-md-9">
        <article class="blog-main">
        @if($ad)
        {!! $ad['acontent'] !!}
        @endif

        </article>


        <hr class="am-article-divider blog-hr">

    </div>

    <div class="am-u-md-3 blog-sidebar">
        <div class="am-panel-group">

            <section class="am-panel am-panel-default">
                <div class="am-panel-hd">热门话题</div>
                <ul class="am-list blog-list">
                    @if($ads)
                    @foreach($ads as $k=>$v)
                    <li><a href="{{url('/blog/index?aid='.$v['aid'])}}"><p>{{$v['atitle']}}</p></a></li>
                    @endforeach
                    @endif
                </ul>
            </section>

        </div>
    </div>

</div>

@include('home.layout.footer')

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

</body>
</html>
