@extends('home/layout/gdetails')
@section('content')
	<!-- 开始 -->	
	<!-- 商品详情开始 -->
	<ol class="am-breadcrumb am-breadcrumb-slash">
		<li><a href="#">首页</a></li>
		<li><a href="#">分类</a></li>
		<li class="am-active">内容</li>
	</ol>
	<script type="text/javascript">
		$(function() {});
		$(window).load(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function(slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<div class="scoll">
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<img src="{!!$data['gsmallpic']!!}" title="pic" />
					</li>
				</ul>
			</div>
		</section>
	</div>

	<!--放大镜-->

	<div class="item-inform">
		<div class="clearfixLeft" id="clearcontent">

			<div class="box">
				<script type="text/javascript">
					$(document).ready(function() {
						$(".jqzoom").imagezoom();
						$("#thumblist li a").click(function() {
							$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
							$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
							$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
						});
					});
				</script>

				<div class="tb-booth tb-pic tb-s310">
					<a href="images/01.jpg"><img src="/homes/images/01_mid.jpg" alt="细节展示放大镜特效" rel="images/01.jpg" class="jqzoom" /></a>
				</div>
				<ul class="tb-thumb" id="thumblist">
					<li class="tb-selected">
						<div class="tb-pic tb-s40">
							<a href="#"><img src="/homes/images/01_small.jpg" mid="images/01_mid.jpg" big="images/01.jpg"></a>
						</div>
					</li>
					<li>
						<div class="tb-pic tb-s40">
							<a href="#"><img src="/homes/images/02_small.jpg" mid="images/02_mid.jpg" big="images/02.jpg"></a>
						</div>
					</li>
					<li>
						<div class="tb-pic tb-s40">
							<a href="#"><img src="/homes/images/03_small.jpg" mid="images/03_mid.jpg" big="images/03.jpg"></a>
						</div>
					</li>
				</ul>
			</div>

			<div class="clear"></div>
		</div>

		<div class="clearfixRight">

			<!--规格属性-->
			<!--名称-->
			<div class="tb-detail-hd">
				<h1>{{$data['gname']}}</h1>
			</div>
			<div class="tb-detail-list">
				<!--价格-->
				<div class="tb-detail-price">
					<li class="price iteminfo_price">
						<dt>转卖价</dt>
						<dd><em>¥</em><b class="sys_item_price">{{$data['gpic']}}</b></dd>         
					</li>
					<div class="clear"></div>
				</div>
				
				<div class="clear"></div>

				<!--销量-->
				<ul class="tm-ind-panel">
					<li class="tm-ind-item tm-ind-sellCount canClick">
						<div class="tm-indcon"><span class="tm-label">宝贝浏览量</span><span class="tm-count">{{$data['gclick']}}</span></div>
					</li>
					<li class="tm-ind-item tm-ind-sumCount canClick">
						<div class="tm-indcon"><span class="tm-label">宝贝收藏量</span><span class="tm-count">{{$data['gcoll']}}</span></div>
					</li>
				</ul>
				<div class="clear"></div>
				<div style="height:30px">
					<div>所在地: &nbsp; &nbsp;  {{$data['gpic']}}</div>
				</div>
				
				<div>
					<div>发布者: &nbsp; &nbsp;  {{$data['gpic']}}</div>
				</div>
			
			</div>
			
			<div class="pay">
				<li>
					<div class="clearfix tb-btn tb-btn-buy theme-login">
						<a id="LikBuy" onclick="buy({{$data['gid']}})" title="点此按钮到下一步确认购买信息" href="javascript:;">我想要</a>
					</div>
				</li>
				<li>
					<div class="clearfix tb-btn tb-btn-basket theme-login">
						<a id="LikBasket" title="联系卖家" href="#"><i></i>联系卖家</a>
					</div>
				</li>				
				<div style="float:left; margin-top:58px; margin-left:-265px;">
						<a><span class="glyphicon glyphicon-heart" aria-hidden="">收藏</span></a>
				</div>
			</div>			
		</div>
		<script>
			function buy(gid)
			{
				//付款生成订单
				$.post("{{url('order/buy')}}/"+gid,{'_token':"{{csrf_token()}}"},function(msg)
					{
						//判断结果
						if(msg == 1){
							location.href= "{{url('order/add')}}/"+gid;
						}else if(msg == 2){
							location.href = location.href;
							layer.msg('商品下架或已售出', {icon: 5});
						}else{
							location.href = location.href;
							layer.msg('无法购买自己的商品', {icon: 5});
						}
					});
			}
		</script>

		<div class="clear"></div>

	</div>
	<div class="clear"></div>
	<!-- introduce-->
	<div class="introduce">
		<div class="browse">
		    <div class="mc"> 
			     <ul>					    
			     	<div class="mt">            
			            <h2>看了又看</h2>        
		            </div>
				      <li>
				      	<div class="p-img">                    
				      		<a  href="#"> <img class="" src="/homes/images/browse1.jpg"> </a>               
				      	</div>
				      	<div class="p-name"><a href="#">
				      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
				      	</a>
				      	</div>
				      	<div class="p-price"><strong>￥35.90</strong></div>
				      </li>							      
			     </ul>					
		    </div>
		</div>
		<div class="introduceMain">
			<div class="am-tabs" data-am-tabs>
				<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
					<li class="am-active">
						<a href="#">

							<span class="index-needs-dt-txt">宝贝详情</span></a>

					</li>

					<li>
						<a href="#">

							<span class="index-needs-dt-txt">宝贝留言</span></a>

					</li>
				</ul>

				<div class="am-tabs-bd">

					<div class="am-tab-panel am-fade am-in am-active">
						

						<div class="details">
							<div class="attr-list-hd after-market-hd">
								<h4>商品描述</h4>
							</div>
							<div class="twlistNews">
								{!!$data['gdesc']!!}
							</div>
						</div>
						<div class="clear"></div>

					</div>

					<div class="am-tab-panel am-fade">
						<ul class="am-comments-list am-comments-list-flip">
							<li class="am-comment">
								<!-- 评论容器 -->
								<a href="">
									<img class="am-comment-avatar" src="/homes/images/hwbn40x40.jpg" />
									<!-- 评论者头像 -->
								</a>

								<div class="am-comment-main">
									<!-- 评论内容容器 -->
									<header class="am-comment-hd">
										<!--<h3 class="am-comment-title">评论标题</h3>-->
										<div class="am-comment-meta">
											<!-- 评论元数据 -->
											<a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a>
											<!-- 评论者 -->
											评论于
											<time datetime="">2015年11月02日 17:46</time>
										</div>
									</header>

									<div class="am-comment-bd">
										<div class="tb-rev-item " data-id="255776406962">
											<div class="J_TbcRate_ReviewContent tb-tbcr-content ">
												摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
											</div>
											<div class="tb-r-act-bar">
												颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
											</div>
										</div>

									</div>
									<!-- 评论内容 -->
								</div>
							</li>
						

						</ul>

						<div class="clear"></div>

						<!--分页 -->
						<ul class="am-pagination am-pagination-right">
							<li class="am-disabled"><a href="#">&laquo;</a></li>
							<li class="am-active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&raquo;</a></li>
						</ul>
						<div class="clear"></div>

						<div class="tb-reviewsft">
							<div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
						</div>

					</div>

					

				</div>

			</div>

	<div class="clear"></div>

<!-- 结尾 -->
@endsection