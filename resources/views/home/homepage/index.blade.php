@extends('home.layout.index')

@section('connect')
    <div class="shopNav">
        <div class="slideall">

            <div class="long-title"><span class="all-goods">全部分类</span></div>
            <div class="nav-cont">
                <ul>
                    <li class="index"><a href="/">首页</a></li>
                    <li class="qc"><a href="/homes/#">鱼塘</a></li>
                    <li class="qc"><a href="{{url('/goods/index')}}">发布闲置</a></li>
                    <li class="qc"><a href="/homes/#">团购</a></li>
                    <li class="qc last"><a href="/homes/#">大包装</a></li>
                </ul>
                <div class="nav-extra">
                    <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
                    <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
                </div>
            </div>

            <!--侧边导航 -->
            <div id="nav" class="navfull">
                <div class="area clearfix">
                    <div class="category-content" id="guide_2">

                        <div class="category">
                            <ul class="category-list" id="js_climit_li">
                                <li class="appliance js_toggle relative first">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="/homes/images/cake.png"></i><a class="ml-22" title="点心">点心/蛋糕</a></h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><span title="蛋糕">蛋糕</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="蛋糕">点心</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>

                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort"><dt><span>实力商家</span></dt>
                                                            <dd><a rel="nofollow" title="呵官方旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >呵官方旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="格瑞旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >格瑞旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="飞彦大厂直供" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >飞彦大厂直供</span></a></dd>
                                                            <dd><a rel="nofollow" title="红e·艾菲妮" target="_blank" href="/homes/#" rel="nofollow"><span >红e·艾菲妮</span></a></dd>
                                                            <dd><a rel="nofollow" title="本真旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >本真旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="杭派女装批发网" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >杭派女装批发网</span></a></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                                <li class="appliance js_toggle relative">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="/homes/images/cookies.png"></i><a class="ml-22" title="饼干、膨化">饼干/膨化</a></h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><span title="饼干">饼干</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="薯片">薯片</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="蛋糕">虾条</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort"><dt><span>实力商家</span></dt>
                                                            <dd><a rel="nofollow" title="YYKCLOT" target="_blank" href="/homes/#" rel="nofollow"><span  class ="red" >YYKCLOT</span></a></dd>
                                                            <dd><a rel="nofollow" title="池氏品牌男装" target="_blank" href="/homes/#" rel="nofollow"><span  class ="red" >池氏品牌男装</span></a></dd>
                                                            <dd><a rel="nofollow" title="男装日志" target="_blank" href="/homes/#" rel="nofollow"><span >男装日志</span></a></dd>
                                                            <dd><a rel="nofollow" title="索比诺官方旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >索比诺官方旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="onTTno傲徒" target="_blank" href="/homes/#" rel="nofollow"><span  class ="red" >onTTno傲徒</span></a></dd>
                                                            <dd><a rel="nofollow" title="玛狮路男装旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >玛狮路男装旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="劳威特品牌男装" target="_blank" href="/homes/#" rel="nofollow"><span >劳威特品牌男装</span></a></dd>
                                                            <dd><a rel="nofollow" title="卡斯郎世家批发城" target="_blank" href="/homes/#" rel="nofollow"><span  class ="red" >卡斯郎世家批发城</span></a></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                                <li class="appliance js_toggle relative">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="/homes/images/meat.png"></i><a class="ml-22" title="熟食、肉类">熟食/肉类</a></h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><span title="猪肉脯">猪肉脯</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="牛肉丝">牛肉丝</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="小香肠">小香肠</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort"><dt><span>实力商家</span></dt>
                                                            <dd><a rel="nofollow" title="花颜巧语 " target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >花颜巧语 </span></a></dd>
                                                            <dd><a rel="nofollow" title="糖衣小屋" target="_blank" href="/homes/#" rel="nofollow"><span >糖衣小屋</span></a></dd>
                                                            <dd><a rel="nofollow" title="卡拉迪克  " target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >卡拉迪克  </span></a></dd>
                                                            <dd><a rel="nofollow" title="暖春童话 " target="_blank" href="/homes/#" rel="nofollow"><span >暖春童话 </span></a></dd>
                                                            <dd><a rel="nofollow" title="华盛童装批发行 " target="_blank" href="/homes/#" rel="nofollow"><span >华盛童装批发行 </span></a></dd>
                                                            <dd><a rel="nofollow" title="奈仕华童装旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >奈仕华童装旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="斑蒂尼BONDYNI" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >斑蒂尼BONDYNI</span></a></dd>
                                                            <dd><a rel="nofollow" title="猫儿朵朵 " target="_blank" href="/homes/#" rel="nofollow"><span >猫儿朵朵 </span></a></dd>
                                                            <dd><a rel="nofollow" title="童衣阁" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >童衣阁</span></a></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                                <li class="appliance js_toggle relative">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="/homes/images/bamboo.png"></i><a class="ml-22" title="素食、卤味">素食/卤味</a></h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><span title="豆干">豆干</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="干笋">干笋</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="鸭脖">鸭脖</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort"><dt><span>实力商家</span></dt>
                                                            <dd><a rel="nofollow" title="歌芙品牌旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >歌芙品牌旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="爱丝蓝内衣厂" target="_blank" href="/homes/#" rel="nofollow"><span >爱丝蓝内衣厂</span></a></dd>
                                                            <dd><a rel="nofollow" title="香港优蓓尔防辐射" target="_blank" href="/homes/#" rel="nofollow"><span >香港优蓓尔防辐射</span></a></dd>
                                                            <dd><a rel="nofollow" title="蓉莉娜内衣批发" target="_blank" href="/homes/#" rel="nofollow"><span >蓉莉娜内衣批发</span></a></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                                <li class="appliance js_toggle relative">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="/homes/images/nut.png"></i><a class="ml-22" title="坚果、炒货">坚果/炒货</a></h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><span title="蛋糕">坚果</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="蛋糕">锅巴</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort"><dt><span>实力商家</span></dt>
                                                            <dd><a rel="nofollow" title="呵呵嘿官方旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >呵呵嘿官方旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="格瑞旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >格瑞旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="飞彦大厂直供" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >飞彦大厂直供</span></a></dd>
                                                            <dd><a rel="nofollow" title="红e·艾菲妮" target="_blank" href="/homes/#" rel="nofollow"><span >红e·艾菲妮</span></a></dd>
                                                            <dd><a rel="nofollow" title="本真旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >本真旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="杭派女装批发网" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >杭派女装批发网</span></a></dd>
                                                            <dd><a rel="nofollow" title="华伊阁旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >华伊阁旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="独家折扣旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >独家折扣旗舰店</span></a></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                                <li class="appliance js_toggle relative">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="/homes/images/candy.png"></i><a class="ml-22" title="糖果、蜜饯">糖果/蜜饯</a></h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><span title="糖果">糖果</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="蜜饯">蜜饯</span></dt>
                                                            <dd><a title="猕猴桃干" href="/homes/#"><span>猕猴桃干</span></a></dd>
                                                            <dd><a title="糖樱桃" href="/homes/#"><span>糖樱桃</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort"><dt><span>实力商家</span></dt>
                                                            <dd><a rel="nofollow" title="YYKCLOT" target="_blank" href="/homes/#" rel="nofollow"><span  class ="red" >YYKCLOT</span></a></dd>
                                                            <dd><a rel="nofollow" title="池氏品牌男装" target="_blank" href="/homes/#" rel="nofollow"><span  class ="red" >池氏品牌男装</span></a></dd>
                                                            <dd><a rel="nofollow" title="男装日志" target="_blank" href="/homes/#" rel="nofollow"><span >男装日志</span></a></dd>
                                                            <dd><a rel="nofollow" title="索比诺官方旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >索比诺官方旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="onTTno傲徒" target="_blank" href="/homes/#" rel="nofollow"><span  class ="red" >onTTno傲徒</span></a></dd>
                                                            <dd><a rel="nofollow" title="卡斯郎世家批发城" target="_blank" href="/homes/#" rel="nofollow"><span  class ="red" >卡斯郎世家批发城</span></a></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                                <li class="appliance js_toggle relative">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="/homes/images/chocolate.png"></i><a class="ml-22" title="巧克力">巧克力</a></h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><span title="蛋糕">巧克力</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="蛋糕">果冻</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort"><dt><span>实力商家</span></dt>
                                                            <dd><a rel="nofollow" title="花颜巧语 " target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >花颜巧语 </span></a></dd>
                                                            <dd><a rel="nofollow" title="糖衣小屋" target="_blank" href="/homes/#" rel="nofollow"><span >糖衣小屋</span></a></dd>
                                                            <dd><a rel="nofollow" title="卡拉迪克  " target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >卡拉迪克  </span></a></dd>
                                                            <dd><a rel="nofollow" title="暖春童话 " target="_blank" href="/homes/#" rel="nofollow"><span >暖春童话 </span></a></dd>
                                                            <dd><a rel="nofollow" title="华盛童装批发行 " target="_blank" href="/homes/#" rel="nofollow"><span >华盛童装批发行 </span></a></dd>
                                                            <dd><a rel="nofollow" title="奈仕华童装旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >奈仕华童装旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="斑蒂尼BONDYNI" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >斑蒂尼BONDYNI</span></a></dd>
                                                            <dd><a rel="nofollow" title="童衣阁" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >童衣阁</span></a></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                                <li class="appliance js_toggle relative">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="/homes/images/fish.png"></i><a class="ml-22" title="海味、河鲜">海味/河鲜</a></h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><span title="海带丝">海带丝</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="小鱼干">小鱼干</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="鱿鱼丝">鱿鱼丝</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                        </dl>
                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort"><dt><span>实力商家</span></dt>
                                                            <dd><a rel="nofollow" title="歌芙品牌旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >歌芙品牌旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="爱丝蓝内衣厂" target="_blank" href="/homes/#" rel="nofollow"><span >爱丝蓝内衣厂</span></a></dd>
                                                            <dd><a rel="nofollow" title="炫点服饰" target="_blank" href="/homes/#" rel="nofollow"><span >炫点服饰</span></a></dd>
                                                            <dd><a rel="nofollow" title="雪茵美内衣厂批发" target="_blank" href="/homes/#" rel="nofollow"><span >雪茵美内衣厂批发</span></a></dd>
                                                            <dd><a rel="nofollow" title="金钻夫人" target="_blank" href="/homes/#" rel="nofollow"><span >金钻夫人</span></a></dd>
                                                            <dd><a rel="nofollow" title="伊美莎内衣" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >伊美莎内衣</span></a></dd>
                                                            <dd><a rel="nofollow" title="粉客内衣旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >粉客内衣旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="泽芳行旗舰店" target="_blank" href="/homes/#" rel="nofollow"><span >泽芳行旗舰店</span></a></dd>
                                                            <dd><a rel="nofollow" title="彩婷" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >彩婷</span></a></dd>
                                                            <dd><a rel="nofollow" title="黛兰希" target="_blank" href="/homes/#" rel="nofollow"><span >黛兰希</span></a></dd>
                                                            <dd><a rel="nofollow" title="香港优蓓尔防辐射" target="_blank" href="/homes/#" rel="nofollow"><span >香港优蓓尔防辐射</span></a></dd>
                                                            <dd><a rel="nofollow" title="蓉莉娜内衣批发" target="_blank" href="/homes/#" rel="nofollow"><span >蓉莉娜内衣批发</span></a></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                                <li class="appliance js_toggle relative">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="/homes/images/tea.png"></i><a class="ml-22" title="花茶、果茶">花茶/果茶</a></h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><span title="蛋糕">蛋糕</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="蛋糕">点心</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort"><dt><span>实力商家</span></dt>
                                                            <dd><a title="今生只围你" target="_blank" href="/homes/#" rel="nofollow"><span >今生只围你</span></a></dd>
                                                            <dd><a title="忆佳人" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >忆佳人</span></a></dd>
                                                            <dd><a title="斐洱普斯" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >斐洱普斯</span></a></dd>
                                                            <dd><a title="聚百坊" target="_blank" href="/homes/#" rel="nofollow"><span  class="red" >聚百坊</span></a></dd>
                                                            <dd><a title="朵朵棉织直营店" target="_blank" href="/homes/#" rel="nofollow"><span >朵朵棉织直营店</span></a></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <b class="arrow"></b>
                                </li>
                                <li class="appliance js_toggle relative last">
                                    <div class="category-info">
                                        <h3 class="category-name b-category-name"><i><img src="/homes/images/package.png"></i><a class="ml-22" title="品牌、礼包">品牌/礼包</a></h3>
                                        <em>&gt;</em></div>
                                    <div class="menu-item menu-in top">
                                        <div class="area-in">
                                            <div class="area-bg">
                                                <div class="menu-srot">
                                                    <div class="sort-side">
                                                        <dl class="dl-sort">
                                                            <dt><span title="大包装">大包装</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                        <dl class="dl-sort">
                                                            <dt><span title="两件套">两件套</span></dt>
                                                            <dd><a title="蒸蛋糕" href="/homes/#"><span>蒸蛋糕</span></a></dd>
                                                            <dd><a title="脱水蛋糕" href="/homes/#"><span>脱水蛋糕</span></a></dd>
                                                            <dd><a title="瑞士卷" href="/homes/#"><span>瑞士卷</span></a></dd>
                                                            <dd><a title="软面包" href="/homes/#"><span>软面包</span></a></dd>
                                                            <dd><a title="马卡龙" href="/homes/#"><span>马卡龙</span></a></dd>
                                                            <dd><a title="千层饼" href="/homes/#"><span>千层饼</span></a></dd>
                                                            <dd><a title="甜甜圈" href="/homes/#"><span>甜甜圈</span></a></dd>
                                                            <dd><a title="蒸三明治" href="/homes/#"><span>蒸三明治</span></a></dd>
                                                            <dd><a title="铜锣烧" href="/homes/#"><span>铜锣烧</span></a></dd>
                                                        </dl>
                                                    </div>
                                                    <div class="brand-side">
                                                        <dl class="dl-sort"><dt><span>实力商家</span></dt>
                                                            <dd><a title="琳琅鞋业" target="_blank" href="/homes/#" rel="nofollow"><span >琳琅鞋业</span></a></dd>
                                                            <dd><a title="宏利鞋业" target="_blank" href="/homes/#" rel="nofollow"><span >宏利鞋业</span></a></dd>
                                                            <dd><a title="比爱靓点鞋业" target="_blank" href="/homes/#" rel="nofollow"><span >比爱靓点鞋业</span></a></dd>
                                                            <dd><a title="浪人怪怪" target="_blank" href="/homes/#" rel="nofollow"><span >浪人怪怪</span></a></dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>


            <!--轮播-->

            <script type="text/javascript">
                (function() {
                    $('.am-slider').flexslider();
                });
                $(document).ready(function() {
                    $("li").hover(function() {
                        $(".category-content .category-list li.first .menu-in").css("display", "none");
                        $(".category-content .category-list li.first").removeClass("hover");
                        $(this).addClass("hover");
                        $(this).children("div.menu-in").css("display", "block")
                    }, function() {
                        $(this).removeClass("hover")
                        $(this).children("div.menu-in").css("display", "none")
                    });
                })
            </script>



            <!--小导航 -->
            <div class="am-g am-g-fixed smallnav">
                <div class="am-u-sm-3">
                    <a href="/homes/sort.html"><img src="/homes/images/navsmall.jpg" />
                        <div class="title">商品分类</div>
                    </a>
                </div>
                <div class="am-u-sm-3">
                    <a href="/homes/#"><img src="/homes/images/huismall.jpg" />
                        <div class="title">大聚惠</div>
                    </a>
                </div>
                <div class="am-u-sm-3">
                    <a href="/homes/#"><img src="/homes/images/mansmall.jpg" />
                        <div class="title">个人中心</div>
                    </a>
                </div>
                <div class="am-u-sm-3">
                    <a href="/homes/#"><img src="/homes/images/moneysmall.jpg" />
                        <div class="title">投资理财</div>
                    </a>
                </div>
            </div>

            <!--走马灯 -->

            <div class="marqueen">
                <span class="marqueen-title">商城头条</span>
                <div class="demo">

                    <ul>
                        <li class="title-first"><a target="_blank" href="/homes/#">
                                <img src="/homes/images/TJ2.jpg"></img>
                                <span>[特惠]</span>商城爆品1分秒
                            </a></li>
                        <li class="title-first"><a target="_blank" href="/homes/#">
                                <span>[公告]</span>商城与广州市签署战略合作协议
                                <img src="/homes/images/TJ.jpg"></img>
                                <p>XXXXXXXXXXXXXXXXXX</p>
                            </a></li>

                        <div class="mod-vip">
                            <div class="m-baseinfo">
                                <a href="/homes/person/index.html">
                                    <img src="/homes/images/getAvatar.do.jpg">
                                </a>
                                <em>
                                    Hi,<span class="s-name">小叮当</span>
                                    <a href="/homes/#"><p>点击更多优惠活动</p></a>
                                </em>
                            </div>
                            <div class="member-logout">
                                <a class="am-btn-warning btn" href="/home/login/login">登录</a>
                                <a class="am-btn-warning btn" href="/homes/register.html">注册</a>
                            </div>
                            <div class="member-login">
                                <a href="/homes/#"><strong>0</strong>待收货</a>
                                <a href="/homes/#"><strong>0</strong>待发货</a>
                                <a href="/homes/#"><strong>0</strong>待付款</a>
                                <a href="/homes/#"><strong>0</strong>待评价</a>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <li><a target="_blank" href="/homes/#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
                        <li><a target="_blank" href="/homes/#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
                        <li><a target="_blank" href="/homes/#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>

                    </ul>
                    <div class="advTip"><img src="/homes/images/advTip.jpg"/></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <script type="text/javascript">
            if ($(window).width() < 640) {
                function autoScroll(obj) {
                    $(obj).find("ul").animate({
                        marginTop: "-39px"
                    }, 500, function() {
                        $(this).css({
                            marginTop: "0px"
                        }).find("li:first").appendTo(this);
                    })
                }
                $(function() {
                    setInterval('autoScroll(".demo")', 3000);
                })
            }
        </script>
    </div>

    <div class="shopMainbg">
        <div class="shopMain" id="shopmain">

            <!--今日推荐 -->

            <div class="am-g am-g-fixed recommendation">
                <div class="clock am-u-sm-3" >
                <img src="/homes/images/2016.png "></img>
                <p>今日<br>推荐</p>
            </div>
            <div class="am-u-sm-4 am-u-lg-3 ">
                <div class="info ">
                    <h3>真的有鱼</h3>
                    <h4>开年福利篇</h4>
                </div>
                <div class="recommendationMain one">
                    <a href="/homes/introduction.html"><img src="/homes/images/tj.png "></img></a>
                </div>
            </div>
            <div class="am-u-sm-4 am-u-lg-3 ">
                <div class="info ">
                    <h3>囤货过冬</h3>
                    <h4>让爱早回家</h4>
                </div>
                <div class="recommendationMain two">
                    <img src="/homes/images/tj1.png "></img>
                </div>
            </div>
            <div class="am-u-sm-4 am-u-lg-3 ">
                <div class="info ">
                    <h3>浪漫情人节</h3>
                    <h4>甜甜蜜蜜</h4>
                </div>
                <div class="recommendationMain three">
                    <img src="/homes/images/tj2.png "></img>
                </div>
            </div>

        </div>
        <div class="clear "></div>
        <!--热门活动 -->

        <div class="am-container activity ">
            <div class="shopTitle ">
                <h4>活动</h4>
                <h3>每期活动 优惠享不停 </h3>
                <span class="more ">
                              <a href="/homes/# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
            </div>
            <div class="am-g am-g-fixed ">
                <div class="am-u-sm-3 ">
                    <div class="icon-sale one "></div>
                    <h4>秒杀</h4>
                    <div class="activityMain ">
                        <img src="/homes/images/activity1.jpg "></img>
                    </div>
                    <div class="info ">
                        <h3>春节送礼优选</h3>
                    </div>
                </div>

                <div class="am-u-sm-3 ">
                    <div class="icon-sale two "></div>
                    <h4>特惠</h4>
                    <div class="activityMain ">
                        <img src="/homes/images/activity2.jpg "></img>
                    </div>
                    <div class="info ">
                        <h3>春节送礼优选</h3>
                    </div>
                </div>

                <div class="am-u-sm-3 ">
                    <div class="icon-sale three "></div>
                    <h4>团购</h4>
                    <div class="activityMain ">
                        <img src="/homes/images/activity3.jpg "></img>
                    </div>
                    <div class="info ">
                        <h3>春节送礼优选</h3>
                    </div>
                </div>

                <div class="am-u-sm-3 last ">
                    <div class="icon-sale "></div>
                    <h4>超值</h4>
                    <div class="activityMain ">
                        <img src="/homes/images/activity.jpg "></img>
                    </div>
                    <div class="info ">
                        <h3>春节送礼优选</h3>
                    </div>
                </div>

            </div>
        </div>
        <div class="clear "></div>


        <div id="f1">
            <!--新闲置-->

            <div class="am-container ">
                <div class="shopTitle ">
                    <h4>新闲置</h4>
                    <h3>每一道甜品都有一个故事</h3>
                    <div class="today-brands ">
                        <a href="/homes/# ">桂花糕</a>
                        <a href="/homes/# ">奶皮酥</a>
                        <a href="/homes/# ">栗子糕 </a>
                        <a href="/homes/# ">马卡龙</a>
                        <a href="/homes/# ">铜锣烧</a>
                        <a href="/homes/# ">豌豆黄</a>
                    </div>
                    <span class="more ">
                    <a href="/homes/# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                </div>
            </div>

            <div class="am-g am-g-fixed floodFour">
                <div class="am-u-sm-5 am-u-md-4 text-one list ">
                    <div class="word">
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                    </div>
                    <a href="/homes/# ">
                        <div class="outer-con ">
                            <div class="title ">
                                开抢啦！
                            </div>
                            <div class="sub-title ">
                                零食大礼包
                            </div>
                        </div>
                        <img src="/homes/images/act1.png " />
                    </a>
                    <div class="triangle-topright"></div>
                </div>

                @if(count($goods)>0)
                <div class="am-u-sm-7 am-u-md-4 text-two sug">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$goods[0]['gname']}}
                        </div>
                        <div class="sub-title ">
                            ¥{{$goods[0]['gpic']}}
                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('goods/details/'.$goods[0]['gid'])}}"><img src="{{url($goods[0]['gsmallpic'])}}" /></a>
                </div>
                @endif

                @if(count($goods)>1)
                <div class="am-u-sm-7 am-u-md-4 text-two">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$goods[1]['gname']}}
                        </div>
                        <div class="sub-title ">
                            ¥{{$goods[1]['gpic']}}
                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('goods/details/'.$goods[1]['gid'])}}"><img src="{{url($goods[1]['gsmallpic'])}}" /></a>
                </div>
                @endif


                @if(count($goods)>2)
                <div class="am-u-sm-3 am-u-md-2 text-three big">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$goods[2]['gname']}}
                        </div>
                        <div class="sub-title ">
                            ¥{{$goods[2]['gpic']}}
                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('goods/details/'.$goods[2]['gid'])}}"><img src="{{url($goods[2]['gsmallpic'])}}" /></a>
                </div>
                @endif

                @if(count($goods)>3)
                <div class="am-u-sm-3 am-u-md-2 text-three sug">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$goods[3]['gname']}}
                        </div>
                        <div class="sub-title ">
                            ¥{{$goods[3]['gpic']}}
                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('goods/details/'.$goods[3]['gid'])}}"><img src="{{url($goods[3]['gsmallpic'])}}" /></a>
                </div>
                @endif

                @if(count($goods)>4)
                <div class="am-u-sm-3 am-u-md-2 text-three ">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$goods[4]['gname']}}
                        </div>
                        <div class="sub-title ">
                            ¥{{$goods[4]['gpic']}}
                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('goods/details/'.$goods[4]['gid'])}}"><img src="{{url($goods[4]['gsmallpic'])}}" /></a>
                </div>
                @endif

                @if(count($goods)>5)
                <div class="am-u-sm-3 am-u-md-2 text-three last big ">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$goods[5]['gname']}}
                        </div>
                        <div class="sub-title ">
                            ¥{{$goods[5]['gpic']}}
                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('goods/details/'.$goods[5]['gid'])}}"><img src="{{url($goods[5]['gsmallpic'])}}" /></a>
                </div>
                @endif

            </div>
            <div class="clear "></div>
        </div>


        <div id="f2">
            <!--坚果-->
            <div class="am-container ">
                <div class="shopTitle ">
                    <h4>坚果</h4>
                    <h3>酥酥脆脆，回味无穷</h3>
                    <div class="today-brands ">
                        <a href="/homes/# ">腰果</a>
                        <a href="/homes/# ">松子</a>
                        <a href="/homes/# ">夏威夷果 </a>
                        <a href="/homes/# ">碧根果</a>
                        <a href="/homes/# ">开心果</a>
                        <a href="/homes/# ">核桃仁</a>
                    </div>
                    <span class="more ">
                    <a href="/homes/# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                </div>
            </div>
            <div class="am-g am-g-fixed floodThree ">
                <div class="am-u-sm-4 text-four list">
                    <div class="word">
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                        <a class="outer" href="/homes/#"><span class="inner"><b class="text">核桃</b></span></a>
                    </div>
                    <a href="/homes/# ">
                        <img src="/homes/images/act1.png " />
                        <div class="outer-con ">
                            <div class="title ">
                                雪之恋和风大福
                            </div>
                        </div>
                    </a>
                    <div class="triangle-topright"></div>
                </div>
                <div class="am-u-sm-4 text-four">
                    <a href="/homes/# ">
                        <img src="/homes/images/6.jpg" />
                        <div class="outer-con ">
                            <div class="title ">
                                雪之恋和风大福
                            </div>
                            <div class="sub-title ">
                                ¥13.8
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>
                <div class="am-u-sm-4 text-four sug">
                    <a href="/homes/# ">
                        <img src="/homes/images/7.jpg" />
                        <div class="outer-con ">
                            <div class="title ">
                                雪之恋和风大福
                            </div>
                            <div class="sub-title ">
                                ¥13.8
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>

                <div class="am-u-sm-6 am-u-md-3 text-five big ">
                    <a href="/homes/# ">
                        <img src="/homes/images/10.jpg" />
                        <div class="outer-con ">
                            <div class="title ">
                                雪之恋和风大福
                            </div>
                            <div class="sub-title ">
                                ¥13.8
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>
                <div class="am-u-sm-6 am-u-md-3 text-five ">
                    <a href="/homes/# ">
                        <img src="/homes/images/8.jpg" />
                        <div class="outer-con ">
                            <div class="title ">
                                雪之恋和风大福
                            </div>
                            <div class="sub-title ">
                                ¥13.8
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>
                <div class="am-u-sm-6 am-u-md-3 text-five sug">
                    <a href="/homes/# ">
                        <img src="/homes/images/9.jpg" />
                        <div class="outer-con ">
                            <div class="title ">
                                雪之恋和风大福
                            </div>
                            <div class="sub-title ">
                                ¥13.8
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>
                <div class="am-u-sm-6 am-u-md-3 text-five big">
                    <a href="/homes/# ">
                        <img src="/homes/images/10.jpg" />
                        <div class="outer-con ">
                            <div class="title ">
                                雪之恋和风大福
                            </div>
                            <div class="sub-title ">
                                ¥13.8
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>

            </div>

            <div class="clear "></div>
        </div>


        <div id="f3">
            <!--鱼塘-->

            <div class="am-container ">
                <div class="shopTitle ">
                    <h4>鱼塘</h4>
                    <h3>每一块鱼塘都有一个故事</h3>
                    <div class="today-brands ">

                        <a href="/homes/# ">北京市</a>
                        <a href="/homes/# ">上海市</a>
                        <a href="/homes/# ">深圳市</a>
                        <a href="/homes/# ">厦门市</a>
                        <a href="/homes/# ">漳州市</a>
                        <a href="/homes/# ">东莞市</a>
                    </div>
                    <span class="more ">
                    <a href="/homes/# ">更多鱼塘<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                </div>
            </div>

            <div class="am-g am-g-fixed floodFour">
                <div class="am-u-sm-5 am-u-md-4 text-one list ">
                    <div class="word">
                        <a class="outer" href="JavaScript:;"><span class="inner"><b class="text">北京市</b></span></a>
                        <a class="outer" href="JavaScript:;"><span class="inner"><b class="text">上海市</b></span></a>
                        <a class="outer" href="JavaScript:;"><span class="inner"><b class="text">深圳市</b></span></a>
                        <a class="outer" href="JavaScript:;"><span class="inner"><b class="text">厦门市</b></span></a>
                        <a class="outer" href="JavaScript:;"><span class="inner"><b class="text">漳州市</b></span></a>
                        <a class="outer" href="JavaScript:;"><span class="inner"><b class="text">东莞市</b></span></a>
                    </div>
                    <a href="JavaScript:;">
                        <div class="outer-con ">
                            <div class="title ">
                                开抢啦！
                            </div>
                            <div class="sub-title ">
                                零食大礼包
                            </div>
                        </div>
                        <img src="/homes/images/act1.png " />
                    </a>
                    <div class="triangle-topright"></div>
                </div>

                @if(!empty($yts) && count($yts)>0)
                <div class="am-u-sm-7 am-u-md-4 text-two sug">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$yts[0]['yname']}}
                        </div>
                        <div class="sub-title ">

                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('fishpond/index?yid='.$yts[0]['yid'])}}"><img src="{{url('/uploads/fishpond/'.$yts[0]['ytpic'])}}" /></a>
                </div>
                @else
                <div class="am-u-sm-7 am-u-md-4 text-two sug">
                    <div class="outer-con ">
                        <div class="title ">
                            雪之恋和风大福
                        </div>
                        <div class="sub-title ">
                            ¥13.8
                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="/homes/# "><img src="/homes/images/2.jpg" /></a>
                </div>
                @endif

                @if(!empty($yts) && count($yts)>1)
                    <div class="am-u-sm-7 am-u-md-4 text-two">
                        <div class="outer-con ">
                            <div class="title ">
                                {{$yts[1]['yname']}}
                            </div>
                            <div class="sub-title ">

                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                        <a href="{{url('fishpond/index?yid='.$yts[1]['yid'])}}"><img src="{{url('/uploads/fishpond/'.$yts[1]['ytpic'])}}" /></a>
                    </div>
                @else
                <div class="am-u-sm-7 am-u-md-4 text-two">
                    <div class="outer-con ">
                        <div class="title ">
                            雪之恋和风大福
                        </div>
                        <div class="sub-title ">

                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="/homes/# "><img src="/homes/images/1.jpg" /></a>
                </div>
                @endif

                @if(!empty($yts) && count($yts)>2)
                <div class="am-u-sm-3 am-u-md-2 text-three big">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$yts[2]['yname']}}
                        </div>
                        <div class="sub-title ">

                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('fishpond/index?yid='.$yts[2]['yid'])}}"><img src="{{url('/uploads/fishpond/'.$yts[2]['ytpic'])}}" /></a>
                </div>
                @else
                <div class="am-u-sm-3 am-u-md-2 text-three big">
                    <div class="outer-con ">
                        <div class="title ">
                            小优布丁
                        </div>
                        <div class="sub-title ">

                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="/homes/# "><img src="/homes/images/5.jpg" /></a>
                </div>
                @endif

                @if(!empty($yts) && count($yts)>3)
                <div class="am-u-sm-3 am-u-md-2 text-three sug">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$yts[3]['yname']}}
                        </div>
                        <div class="sub-title ">

                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('fishpond/index?yid='.$yts[3]['yid'])}}"><img src="{{url('/uploads/fishpond/'.$yts[3]['ytpic'])}}" /></a>
                </div>
                @else
                <div class="am-u-sm-3 am-u-md-2 text-three sug">
                    <div class="outer-con ">
                        <div class="title ">
                            小优布丁
                        </div>
                        <div class="sub-title ">

                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="/homes/# "><img src="/homes/images/3.jpg" /></a>
                </div>
                @endif

                @if(!empty($yts) && count($yts)>4)
                <div class="am-u-sm-3 am-u-md-2 text-three ">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$yts[4]['yname']}}
                        </div>
                        <div class="sub-title ">

                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('fishpond/index?yid='.$yts[4]['yid'])}}"><img src="{{url('/uploads/fishpond/'.$yts[4]['ytpic'])}}" /></a>
                </div>
                @else
                <div class="am-u-sm-3 am-u-md-2 text-three ">
                    <div class="outer-con ">
                        <div class="title ">
                            小优布丁
                        </div>
                        <div class="sub-title ">
                            ¥4.8
                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="/homes/# "><img src="/homes/images/4.jpg" /></a>
                </div>
                @endif

                @if(!empty($yts) && count($yts)>5)
                <div class="am-u-sm-3 am-u-md-2 text-three last big ">
                    <div class="outer-con ">
                        <div class="title ">
                            {{$yts[5]['yname']}}
                        </div>
                        <div class="sub-title ">

                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="{{url('fishpond/index?yid='.$yts[5]['yid'])}}"><img src="{{url('/uploads/fishpond/'.$yts[5]['ytpic'])}}" /></a>
                </div>
                @else
                <div class="am-u-sm-3 am-u-md-2 text-three last big ">
                    <div class="outer-con ">
                        <div class="title ">
                            小优布丁
                        </div>
                        <div class="sub-title ">
                            ¥4.8
                        </div>
                        <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                    </div>
                    <a href="/homes/# "><img src="/homes/images/5.jpg" /></a>
                </div>
                @endif

            </div>
            <div class="clear "></div>
        </div>



@endsection
