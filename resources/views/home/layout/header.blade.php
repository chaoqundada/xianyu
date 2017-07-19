<div class="hmtop">
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
                <div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
            </div>
            <div class="topMessage my-shangcheng">
                <div class="menu-hd MyShangcheng"><a href="{{url('user/index')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
            </div>
            @if(session('user'))
            <div class="topMessage mini-cart">
                <div class="menu-hd"><a id="mc-menu-hd" href="{{url('myfishpond/')}}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>我的鱼塘</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
            </div>
            @endif
            <div class="topMessage favorite">
                <div style="display: none" class="menu-hd"><a href="{{url('order/coll')}}" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
        </ul>
    </div>

    <!--悬浮搜索框-->

    <div class="nav white">
        <div class="logoBig">
            <li><a href="/"><img src="{{config('dll.LOGO')}}" /></a></li>
        </div>

        <div class="search-bar pr">
            <a name="index_none_header_sysc" href="/homes/#"></a>
            <form action="{{url('/search')}}" method="get" >
                <input id="searchInput" name="search" type="text" placeholder="搜索" autocomplete="off">
                <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
            </form>
        </div>
    </div>

    <div class="clear"></div>
</div>
