<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>个人资料</title>
    <link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/infstyle.css" rel="stylesheet" type="text/css">
    <link href="{{url('homes/css/addstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('homes/css/orstyle.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/homes/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
    <script language="javascript" src="{{url('homes/js/PCASClass.js')}}"></script>
    <script language="javascript" src="{{url('layer/layer.js')}}"></script>
    <link href="{{url('homes/css/stepstyle.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('homes/css/systyle.css')}}" rel="stylesheet" type="text/css">
    <script src="/homes/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<!--头 -->
<header>
    <article>
        <div class="mt-logo">
            <!--顶部导航条 -->
            <div class="am-container header">
                <ul class="message-l">
                    <div class="topMessage">
                        <div class="menu-hd">
                            @if(session('user'))
                                <span class="h">欢迎:{{session('user')['uname']}}登录</span>
                                <a href="{{url('login/outlogin')}}" target="_top">退出</a>
                            @else
                                <a href="{{url('login/login')}}" target="_top" class="h">亲，请登录</a>
                                <a href="{{url('user/add')}}" target="_top">免费注册</a>
                            @endif
                        </div>
                    </div>
                </ul>
                <ul class="message-r">
                    <div class="topMessage home">
                        <div class="menu-hd"><a href="{{url('/')}}" target="_top" class="h">商城首页</a></div>
                    </div>
                    <div class="topMessage my-shangcheng">
                        <div class="menu-hd MyShangcheng">
                            <a href="{{url('user/index')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
                            <a href="/myfishpond" target="_top"><i class="am-icon-user am-icon-fw"></i>我的鱼塘</a>
                        </div>
                    </div>
                    <div class="topMessage mini-cart">
                        <div class="menu-hd"><a id="mc-menu-hd" href="/homes/#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
                    </div>
                    <div class="topMessage favorite">
                        <div class="menu-hd"><a href="/home/user_coll/add" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
                </ul>
            </div>

            <!--悬浮搜索框-->

            <div class="nav white">
                <div class="logoBig">
                    <li><img src="/homes/images/logobig.png" /></li>
                </div>

                <div class="search-bar pr">
                    <a name="index_none_header_sysc" href="/homes/#"></a>
                    <form>
                        <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
                        <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                    </form>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        </div>
    </article>
</header>
<div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
    <div class="nav-cont">
        <ul>
            <li class="index"><a href="{{url('/')}}">首页</a></li>
            <li class="qc"><a href="/homes/#">闪购</a></li>
            <li class="qc"><a href="/homes/#">限时抢</a></li>
            <li class="qc"><a href="/homes/#">团购</a></li>
            <li class="qc last"><a href="/homes/#">大包装</a></li>
        </ul>
        <div class="nav-extra">
            <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
            <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
        </div>
    </div>
</div>
<b class="line"></b>
<div class="center">
    <div class="col-main">
        <div class="main-wrap">
    <!-- 内容开始 -->
    @section('content')

    @show
    <!-- 内容结束 -->
        </div>
        <!--底部-->
        <div class="footer">
            <div class="footer-hd">
                <p>
                    <a href="#">恒望科技</a>
                    <b>|</b>
                    <a href="#">商城首页</a>
                    <b>|</b>
                    <a href="#">支付宝</a>
                    <b>|</b>
                    <a href="#">物流</a>
                </p>
            </div>
            <div class="footer-bd">
                <p>
                    <a href="#">关于恒望</a>
                    <a href="#">合作伙伴</a>
                    <a href="#">联系我们</a>
                    <a href="#">网站地图</a>
                    <em>© 2015-2025 Hengwang.com 版权所有</em>
                </p>
            </div>
        </div>
    </div>

    <aside class="menu">
        <ul id='ul'>
            <li class="person">
                <a href="{{url('user/index')}}">个人中心</a>
            </li>
            <li class="person">
                <a href="#">个人资料</a>
                <ul>
                    <li class="person"> <a href="{{url('user/detil')}}">个人信息</a></li>
                    <li> <a href="{{url('pass/security')}}">安全设置</a></li>
                    <li> <a href="{{url('addr/add')}}">收货地址</a></li>
                </ul>
            </li>
            <li class="person">
                <a href="#">我的交易</a>
                <ul>
                    <li><a href="{{url('order/index')}}">订单管理</a></li>
                    <li> <a href="{{url('order/refund')}}">退款售后</a></li>
                </ul>
            </li>
            <li class="person">
                <a href="#">我的资产</a>
                <ul>
                    <li> <a href="coupon.html">优惠券 </a></li>
                    <li> <a href="bonus.html">红包</a></li>
                    <li> <a href="bill.html">账单明细</a></li>
                </ul>
            </li>

            <li class="person">
                <a href="{{url('/report/index')}}">我的举报</a>
                <a href="#">我的小窝</a>
                <ul>
                    <li> <a href="collection.html">收藏</a></li>
                    <li> <a href="foot.html">足迹</a></li>
                    <li> <a href="comment.html">评价</a></li>
                    <li> <a href="news.html">消息</a></li>

                </ul>
            </li>

        </ul>

    </aside>
</div>
</body>
</html>