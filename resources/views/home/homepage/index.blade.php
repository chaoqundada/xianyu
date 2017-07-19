@extends('home.layout.index')

@section('connect')
    <div class="shopNav">
        <div class="slideall">

            <div class="long-title"><span class="all-goods">全部分类</span></div>
            <div class="nav-cont">
                @include('home.layout.nav')
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
                             @if(!empty($types))
                                    @foreach($types as $v)

                                <li class="appliance js_toggle relative">
                                    <div class="category-info" >
                                        <h3 class="category-name b-category-name">
                                            <i>
                                                <img src="/homes/images/cake.png">
                                            </i>
                                            <a class="ml-22" title="点心">{{$v['tname']}}</a>
                                        </h3>
                                        <em>&gt;</em>
                                    </div>
                                    
                                    <div class="menu-item menu-in top" style="height:150px;">
                                        <div class="area-in" >
                                            <div class="area-bg" >
                                                <div class="menu-srot" >

                                                <?php 

                                                    $types_2 = DB::table('type')->where('pid',$v['tid'])->get();  

                                                ?>
                                                    <div class="sort-side" >
                                                       
                                                            @foreach($types_2 as $n => $m)
                                                        <dl class="dl-sort" >
                                                            <dt><span title="蛋糕">{{$m['tname']}}</span></dt>
                                                            <?php $types_3 = DB::table('type')->where('pid',$m['tid'])->get();
                                                            ?>
                                                            @foreach($types_3 as $h)
                                                            <dd>
                                                                <a title="蒸蛋糕" href="{{url('/search').'?tid='.$h['tid']}}"><span>{{$h['tname']}}</span></a>
                                                            </dd>
                                                            @endforeach
                                                        </dl>
                                                            @endforeach
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <b class="arrow"></b>
                                </li>
                              
                            
                            @endforeach
                        @endif
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
                        @if(count($ads)>0)
                        <li class="title-first"><a target="_blank" href="{{url('blog?aid='.$ads[0]['aid'])}}">{{$ads[0]['atitle']}}</a></li>
                        @endif

                        @if(count($ads)>1)
                            <li class="title-first"><a target="_blank" href="{{url('blog?aid='.$ads[1]['aid'])}}">{{$ads[1]['atitle']}}</a></li>
                        @endif

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

                        @if(count($ads)>2)
                            <li class="title-first"><a target="_blank" href="{{url('blog?aid='.$ads[2]['aid'])}}">{{$ads[2]['atitle']}}</a></li>
                        @endif
                        @if(count($ads)>3)
                            <li class="title-first"><a target="_blank" href="{{url('blog?aid='.$ads[3]['aid'])}}">{{$ads[3]['atitle']}}</a></li>
                        @endif
                        @if(count($ads)>4)
                            <li class="title-first"><a target="_blank" href="{{url('blog?aid='.$ads[4]['aid'])}}">{{$ads[4]['atitle']}}</a></li>
                        @endif

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
                    <h4>最新闲置</h4>
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
                    <h4>最热闲置</h4>
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
                                公告位招租
                            </div>
                        </div>
                    </a>
                    <div class="triangle-topright"></div>
                </div>

                @if(count($collgoods)>0)
                <div class="am-u-sm-4 text-four">
                    <a href="{{url('goods/details/'.$collgoods[0]['gid'])}}">
                        <img src="{{url($collgoods[0]['gsmallpic'])}}" />
                        <div class="outer-con ">
                            <div class="title ">
                                {{$collgoods[0]['gname']}}
                            </div>
                            <div class="sub-title ">
                                ¥{{$collgoods[0]['gpic']}}
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>
                @endif

                @if(count($collgoods)>1)
                <div class="am-u-sm-4 text-four sug">
                    <a href="{{url('goods/details/'.$collgoods[1]['gid'])}}">
                        <img src="{{url($collgoods[1]['gsmallpic'])}}" />
                        <div class="outer-con ">
                            <div class="title ">
                                {{$collgoods[1]['gname']}}
                            </div>
                            <div class="sub-title ">
                                ¥{{$collgoods[1]['gpic']}}
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>
                @endif

                @if(count($collgoods)>2)
                <div class="am-u-sm-6 am-u-md-3 text-five big ">
                    <a href="{{url('goods/details/'.$collgoods[2]['gid'])}}">
                        <img src="{{url($collgoods[2]['gsmallpic'])}}" />
                        <div class="outer-con ">
                            <div class="title ">
                                {{$collgoods[2]['gname']}}
                            </div>
                            <div class="sub-title ">
                                ¥{{$collgoods[2]['gpic']}}
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>
                @endif

                @if(count($collgoods)>3)
                <div class="am-u-sm-6 am-u-md-3 text-five ">
                    <a href="{{url('goods/details/'.$collgoods[3]['gid'])}}">
                        <img src="{{url($collgoods[3]['gsmallpic'])}}" />
                        <div class="outer-con ">
                            <div class="title ">
                                {{$collgoods[3]['gname']}}
                            </div>
                            <div class="sub-title ">
                                ¥{{$collgoods[3]['gpic']}}
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>
                @endif

                @if(count($collgoods)>4)
                <div class="am-u-sm-6 am-u-md-3 text-five sug">
                    <a href="{{url('goods/details/'.$collgoods[4]['gid'])}}">
                        <img src="{{url($collgoods[4]['gsmallpic'])}}" />
                        <div class="outer-con ">
                            <div class="title ">
                                {{$collgoods[4]['gname']}}
                            </div>
                            <div class="sub-title ">
                                ¥{{$collgoods[4]['gpic']}}
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>
                @endif

                @if(count($collgoods)>5)
                <div class="am-u-sm-6 am-u-md-3 text-five big">
                    <a href="{{url('goods/details/'.$collgoods[5]['gid'])}}">
                        <img src="{{url($collgoods[5]['gsmallpic'])}}" />
                        <div class="outer-con ">
                            <div class="title ">
                                {{$collgoods[4]['gname']}}
                            </div>
                            <div class="sub-title ">
                                ¥{{$collgoods[4]['gpic']}}
                            </div>
                            <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                        </div>
                    </a>
                </div>
                @endif

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
                    <a href="{{url('/fishpond/list')}}">更多鱼塘<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
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
