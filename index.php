<?php
require_once 'include.php';

$cates=getAllcate();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
<link href="css/hmstyle.css" rel="stylesheet" type="text/css"/>
<link href="css/skin.css" rel="stylesheet" type="text/css" />
<script src="AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
<script src="AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="js/ie6Fixpng.js"></script>
<![endif]-->
</head>
<body>
		<div class="hmtop">
			<!--顶部导航条 -->
			<div class="header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							<?php if(@$_SESSION['loginFlag']):?>
							<span>欢迎您</span><?php echo $_SESSION['username'];?>
							<a href="doAction.php?act=userOut">[退出]</a>
							<?php else:?>
							<a href="login.php">[登录]</a><a href="reg.php">[免费注册]</a>
<!-- 							<a href="#" target="_top" class="h">亲，请登录</a>
							<a href="#" target="_top">免费注册</a> -->
							<?php endif;?>
						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="index.php" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="information.php" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd"><a id="mc-menu-hd" href="shopcart.php" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
					</div>
				</ul>
			</div>

				<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="images/logo.jpg" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form  action="doAction.php?act=search" method="post">
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>
		</div>
		<div class="banner">
                      <!--轮播 -->
			<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
				<ul class="am-slides">
					<li class="banner1"><a href="introduction.html"><img src="images/ad1.jpg" /></a></li>
					<li class="banner2"><a><img src="images/ad2.jpg" /></a></li>
					<li class="banner3"><a><img src="images/ad3.jpg" /></a></li>
					<li class="banner4"><a><img src="images/ad4.jpg" /></a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="shopNav">
			<div class="slideall">
				<div class="long-title"><span class="all-goods">全部分类</span></div>
						<!--侧边导航 -->
				<div id="nav" class="navfull" style="display:block;">
					<div class="area clearfix">
						<div class="category-content" id="guide_2">
							<div class="category">
								<ul class="category-list" id="js_climit_li">
									<?php foreach($cates as $cat):?>
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="images/cake.png"></i><a class="ml-22" title="点心"><?php echo $cat['cName'];?></a></h3>
													<em>&gt;</em></div>
											<b class="arrow"></b>
											</li>
									<?php endforeach;?>
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
<!-- 				<div class="marqueen">
					<span class="marqueen-title">商城头条</span>
					<div class="demo">
						<ul>
							<li class="title-first">
								<a target="_blank" href="#">
									<img src="images/TJ2.jpg">
									<span>[特惠]</span>商城爆品1分秒
								</a>
							</li>
							<li class="title-first">
								<a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="images/TJ.jpg">
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a>
							</li>

							<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="person/index.html">
									<img src="images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name">您好</span>
									<a href="#"><p>点击更多优惠活动</p></a>
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="login.php">登录</a>
								<a class="am-btn-warning btn" href="reg.php">注册</a>
							</div>
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>
							</div>

							<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
							<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
							<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>

						</ul>
                        <div class="advTip"><img src="images/advTip.jpg"/></div>
					</div>
				</div>
				<div class="clear"></div> -->
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
						<img src="images/2016.png ">
						<p>今日<br>推荐</p>
					</div>
					<div class="am-u-sm-4 am-u-lg-3 ">
						<div class="info ">
							<h3>真的有鱼</h3>
							<h4>开年福利篇</h4>
						</div>
						<div class="recommendationMain one">
							<a href="introduction.html"><img src="images/tj.png "></a>
						</div>
					</div>
					<div class="am-u-sm-4 am-u-lg-3 ">
						<div class="info ">
							<h3>囤货过冬</h3>
							<h4>让爱早回家</h4>
						</div>
						<div class="recommendationMain two">
							<img src="images/tj1.png ">
						</div>
					</div>
					<div class="am-u-sm-4 am-u-lg-3 ">
						<div class="info ">
							<h3>浪漫情人节</h3>
							<h4>甜甜蜜蜜</h4>
						</div>
						<div class="recommendationMain three">
							<img src="images/tj2.png ">
						</div>
					</div>
				</div>
				<div class="clear "></div>



                <div id="f1">
					<!--甜点-->
					<?php foreach($cates as $cate):?>
					<div class="am-container ">
						<div class="shopTitle ">
							<h4><?php echo $cate['cName'];?></h4>
							<span class="more ">
                    			<a href="search.php?id=<?php echo $cate['id'];?> ">更多<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        	</span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
								<a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
							</div>
							<a href="# ">
								<img src="images/act1.png " />
								<div class="outer-con ">
									<div class="title ">
									</div>
								</div>
							</a>
							<div class="triangle-topright"></div>
						</div>
						<?php
						@$pros=getProsByCid($cate['id']);
						if($pros &&is_array($pros)):
						foreach($pros as $pro):
						$proImg=getProImgById($pro['id']);
						?>
						<ul>
							<li>
								<div class="am-u-sm-7 am-u-md-4 text-two">
									<div class="outer-con ">
										<div class="title ">
											<?php echo $pro['pName'];?>
										</div>
										<div class="sub-title ">
											<?php echo $pro['iPrice'];?>元
										</div>
										<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
									</div>
									<a href="proDetails.php?id=<?php echo $pro['id'];?>"><img src="image_220/<?php echo $proImg['albumPath'];?>" /></a>
								</div>
							</li>
						</ul>
						<?php
						endforeach;
						endif;
						?>
					</div>
            		<div class="clear "></div>
            	<?php endforeach;?>
            	</div>

			</div>
		</div>
				<div class="footer ">
			<div class="foot">
				<div class="f_nav">
    				<div class="w1200">
            			<dl>
                			<dt>新手指南</dt>
                			<dd>
                    			<a href="#">注册新用户</a>
                    			<a href="#">商品订购流程</a>
                    			<a href="#">会员注册协议</a>
                			</dd>
            			</dl>
            			<dl>
                			<dt>付款方式</dt>
                			<dd>
                    			<a href="#">支付宝支付</a>
                    			<a href="#">网上银行支付</a>
                    			<a href="#">货到付款</a>
                			</dd>
            			</dl>
            			<dl>
                			<dt>常见问题</dt>
                			<dd>
                    			<a href="#">订单状态</a>
                    			<a href="#">发票说明</a>
                			</dd>
            			</dl>
            			<dl>
                			<dt>售后服务</dt>
                			<dd>
                    			<a href="#">退换货政策</a>
                    			<a href="#">退换货流程</a>
                    			<a href="#">退款说明</a>
                    			<a href="#">退换货申请</a>
                			</dd>
            			</dl>
            			<dl>
                			<dt>客服中心</dt>
                			<dd>
                    			<a href="#">常见问题</a>
                    			<a href="#">联系客服</a>
                    			<a href="#">投诉与建议</a>
                			</dd>
            			</dl>
            			<div class="clear"></div>
        			</div>
    			</div>
    			<div class="w1200">
        			<div class="bottom">
            			<a href="#">关于我们</a>|<a href="#">帮助中心</a>|<a href="#">法律声明</a>|<a href="#">用户协议</a>|<a href="#">联系我们</a>|<a href="#">人才招聘</a>|<a href="#">站点地图</a>
           				<p>123@123</p>
        			</div>
    			</div>
			</div>
		</div>


		<!--菜单 -->

		<script>
			window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src="basic/js/quick_links.js "></script>
</body>
</html>
