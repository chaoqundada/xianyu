<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>我的鱼塘</title>

    <link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

    <link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/homes/css/infstyle.css" rel="stylesheet" type="text/css">
    <script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>

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
                            <a href="/homes/#" target="_top" class="h">亲，请登录</a>
                            <a href="/homes/#" target="_top">免费注册</a>
                        </div>
                    </div>
                </ul>
                <ul class="message-r">
                    <div class="topMessage home">
                        <div class="menu-hd"><a href="/homes/#" target="_top" class="h">商城首页</a></div>
                    </div>
                    <div class="topMessage my-shangcheng">
                        <div class="menu-hd MyShangcheng">
                            <a href="/homes/#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
                            <a href="/myfishpond" target="_top"><i class="am-icon-user am-icon-fw"></i>我的鱼塘</a>
                        </div>
                    </div>
                    <div class="topMessage mini-cart">
                        <div class="menu-hd"><a id="mc-menu-hd" href="/homes/#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
                    </div>
                    <div class="topMessage favorite">
                        <div class="menu-hd"><a href="/homes/#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
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
            <li class="index"><a href="/homes/#">首页</a></li>
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
@section('content')

@show
<!--底部-->
    <div class="footer">
        <div class="footer-hd">
            <p>
                <a href="/homes/#">友情链接1</a>
                <b>|</b>
                <a href="/homes/#">友情链接2</a>
                <b>|</b>
                <a href="/homes/#">友情链接3</a>
                <b>|</b>
                <a href="/homes/#">友情链接4</a>
            </p>
        </div>
        <div class="footer-bd">
            <p>
                <a href="/homes/#">关于兄弟连</a>
                <a href="/homes/#">合作伙伴</a>
                <a href="/homes/#">联系我们</a>
                <a href="/homes/#">网站地图</a>
                <em>© 2015-2025 xianyu.com 版权所有</em>
            </p>
        </div>
    </div>
    </div>
    <aside class="menu">
        <ul>
            <li class="person">
                <a href="/homes/index.html">鱼塘中心</a>
            </li>
            <li class="person">
                <a href="javascript:;">鱼塘信息</a>
                <ul>
                    <li class="active"> <a href="{{url('/myfishpond/list')}}">鱼塘列表</a></li>
                    <li> <a href="{{url('/myfishpond/add')}}">添加鱼塘</a></li>
                </ul>
            </li>
            <li class="person">
                <a href="/homes/#">我的交易</a>
                <ul>
                    <li><a href="/homes/order.html">订单管理</a></li>
                    <li> <a href="/homes/change.html">退款售后</a></li>
                </ul>
            </li>
            <li class="person">
                <a href="/homes/#">我的资产</a>
                <ul>
                    <li> <a href="/homes/coupon.html">优惠券 </a></li>
                    <li> <a href="/homes/bonus.html">红包</a></li>
                    <li> <a href="/homes/bill.html">账单明细</a></li>
                </ul>
            </li>

            <li class="person">
                <a href="/homes/#">我的小窝</a>
                <ul>
                    <li> <a href="/homes/collection.html">收藏</a></li>
                    <li> <a href="/homes/foot.html">足迹</a></li>
                    <li> <a href="/homes/comment.html">评价</a></li>
                    <li> <a href="/homes/news.html">消息</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>
</body>

</html>