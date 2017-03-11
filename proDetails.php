<?php
require_once 'include.php';
$id=$_REQUEST['id'];
$proInfo=getProById($id);
$cates = getAllcate();
$proImgs=getProImgsById($id);
if(!($proImgs &&is_array($proImgs))){
	alertMes("商品图片错误", "index.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>商品页面</title>

		<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link type="text/css" href="css/optstyle.css" rel="stylesheet" />
		<link type="text/css" href="css/style.css" rel="stylesheet" />
		<link href="css/skin.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="basic/js/quick_links.js"></script>
		<script type="text/javascript" src="AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script type="text/javascript" src="js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="js/list.js"></script>
		<script type="text/javascript" src="js/jquery.imagezoom.min.js"></script>

	</head>

	<body>


		<!--顶部导航条 -->
		<div class="am-container header">
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
					<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</div>
			</ul>
		</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><a href="index.php"><img src="images/logo.png" /></a></div>
				<div class="logoBig">
					<li><a href="index.php"><img src="images/logo.jpg" /></a></li>
				</div>
				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>
          <!--   <b class="line"></b> -->
			<div class="listMain">

				<!--分类-->
		<!-- 	<div class="nav-table">
				<div class="long-title"><span class="all-goods">全部分类</span></div>
				<div class="nav-cont">
					<ul>
						<li class="index"><a href="#">首页</a></li>
                        <li class="qc"><a href="#">闪购</a></li>
                        <li class="qc"><a href="#">限时抢</a></li>
                        <li class="qc"><a href="#">团购</a></li>
                        <li class="qc last"><a href="#">大包装</a></li>
					</ul>
						</div>
			</div> -->
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
									<img src="images/01.jpg" title="pic" />
								</li>
								<li>
									<img src="images/02.jpg" />
								</li>
								<li>
									<img src="images/03.jpg" />
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
								<a href="image_800/<?php echo  $proImgs[0]['albumPath'];?>"><img src="image_350/<?php  echo $proImgs[0]['albumPath'];?>" alt="细节展示放大镜特效" rel="image_800/<?php echo  $proImgs[0]['albumPath'];?>" class="jqzoom" /></a>
							</div>
							<ul class="tb-thumb" id="thumblist">
							<?php foreach($proImgs as $key=>$proImg):?>
								<li class="tb-selected">
									<div class="tb-pic tb-s40">
										<a href="javascript:void(0)"><img src="image_50/<?php echo $proImg['albumPath'];?>" mid="image_350/<?php echo $proImg['albumPath'];?>" big="image_800/<?php echo $proImg['albumPath'];?>"></a>
									</div>
								</li>
							<?php endforeach;?>
							</ul>
						</div>
						<div class="clear"></div>
					</div>

					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd">
							<h1>
				 				<?php echo $proInfo['pName'];?>
	          				</h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								<li class="price iteminfo_price">
									<dt>促销价</dt>
									<dd><em>￥</em><?php echo $proInfo['iPrice'];?></dd>
								</li>
								<li class="price iteminfo_mktprice">
									<dt>原价</dt>
									<dd><em>￥</em><?php echo $proInfo['mPrice'];?></dd>
								</li>
								<div class="clear"></div>
							</div>

							<!--地址-->
							<dl class="iteminfo_parameter freight">

							</dl>
							<div class="clear"></div>

							<!--销量-->
							<ul class="tm-ind-panel">
								<li class="tm-ind-item tm-ind-sellCount canClick">
									<div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count">1015</span></div>
								</li>
								<li class="tm-ind-item tm-ind-sumCount canClick">
									<div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">6015</span></div>
								</li>
								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">640</span></div>
								</li>
							</ul>
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>

									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod dform">
											<form class="theme-signin" name="loginform" action="" method="post">

												<div class="theme-signin-left">

													<div class="theme-options">
														<div class="cart-title">口味</div>
														<ul>
															<li class="sku-line selected">原味</li>
															<li class="sku-line">奶油</li>
															<li class="sku-line">炭烧</li>
															<li class="sku-line">咸香</li>
														</ul>
													</div>
													<div class="theme-options">
														<div class="cart-title">包装</div>
														<ul>
															<li class="sku-line selected">手袋单人份</li>
															<li class="sku-line">礼盒双人份</li>
															<li class="sku-line">全家福礼包</li>
														</ul>
													</div>
													<div class="theme-options">
														<div class="cart-title number">数量</div>
														<dd>
															<input id="min" class="am-btn am-btn-default" name="" type="button" value="-" />
															<input id="text_box" name="" type="text" value="1" style="width:30px;" />
															<input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
															<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
														</dd>

													</div>
													<div class="clear"></div>

													<div class="btn-op">
														<div class="btn am-btn am-btn-warning">确认</div>
														<div class="btn close am-btn am-btn-warning">取消</div>
													</div>
												</div>
												<div class="theme-signin-right">
													<div class="img-info">
														<img src="images/songzi.jpg" />
													</div>
													<div class="text-info">
														<span class="J_Price price-now">¥39.00</span>
														<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
													</div>
												</div>

											</form>
										</div>
									</div>

								</dd>
							</dl>
							<div class="clear"></div>
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<dt class="tb-metatit">店铺优惠</dt>
									<div class="gold-list">
										<p>购物满2件打8折，满3件7折</p>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>

						<div class="pay">
							<div class="pay-opt">
							<a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
							<a><span class="am-icon-heart am-icon-fw">收藏</span></a>

							</div>
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="#">立即购买</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<a id="LikBasket" title="加入购物车" href="#"><i></i>加入购物车</a>
								</div>
							</li>
						</div>

					</div>

					<div class="clear"></div>

				</div>



				<!-- introduce-->

				<div class="introduce">
					<div class="browse">
					    <div class="mc">
						     <ul>
						     	<div class="mt">
						            <h2>看了又看</h2>
					            </div>

								<?php foreach($cates as $cate):
										if ($cate['id']):
											@$pros=getProsByCid($cate['id']);
											if($pros &&is_array($pros)):
											foreach($pros as $pro):
											$proImag=getProImgById($pro['id']);
								?>
							      <li>
							      	<div class="p-img">
							      		<a  href="proDetails.php?id=<?php echo $pro['id'];?>"> <img class="" src="image_220/<?php echo $proImag['albumPath'];?>"> </a>
							      	</div>
							      	<div class="p-name"><a href="proDetails.php?id=<?php echo $pro['id'];?>">
							      		<?php echo $pro['pName'];?>
							      	</a>
							      	</div>
							      	<div class="p-price"><strong><?php echo $pro['iPrice'];?>元</strong></div>
							      </li>

					      		<?php
					      		endforeach;
					      		endif;
					      		endif;
					      		endforeach;?>
						     </ul>
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">



							</ul>

							<div class="am-tabs-bd">

								<div class="am-tab-panel am-fade am-in am-active">
									<div class="J_Brand">

									<?php echo $proInfo['pDesc'];?>
									<div class="clear"></div>

								</div>



							</div>

						</div>

						<div class="clear"></div>

		<div class="footer" id="foot">
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
           				<p>网络文化经营许可证：粤网文[2015]0295-065号<br />© 2015 深圳易易城科技网络有限公司. 粤ICP备15042543号</p>
        			</div>
    			</div>
			</div>
		</div>
					</div>

				</div>
			</div>
			<!--菜单 -->

	</body>

</html>