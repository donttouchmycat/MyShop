<?php 
require_once 'include.php';
@$id=$_REQUEST['id'];
@$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
@$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"pName like '%{$keywords}%'":null;
$sql = "select * from my_pro where cId={$id} {$where}";
$totalRows = getResultNum($sql);
$pageSize = 20;
$totalPage = ceil($totalRows/$pageSize);
if ($page<1||$page==null||!is_numeric($page))$page=1;
if ($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql = "select * from my_pro where cId={$id} {$where} order by id limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>搜索页面</title>

		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="css/skin.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="css/seastyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					<?php if(@$_SESSION['loginFlag']):?>
							<span>欢迎您</span><?php echo $_SESSION['username'];?>
							<a href="doAction.php?act=userOut">[退出]</a>
							<?php else:?>
							<a href="login.php">[登录]</a><a href="reg.php">[免费注册]</a>
<!-- 							<a href="#" target="_top" class="h">亲，请登录</a>
							<a href="#" target="_top">免费注册</a> -->
							<?php endif;?>
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
				<div class="logo"><img src="images/logo.png" /></div>
				<div class="logoBig">
					<a href="index.php"><li><img src="images/logo.jpg" /></li></a>
				</div>

				<div class="search-bar pr">
					<form action="doAction.php?act=search" method="post">
						<input id="searchInput" name="key" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn"  value="搜索" index="1" type="submit" >
					</form>
				</div>
			</div>

			<div class="clear"></div>
			<b class="line"></b>
    <div class="search">
		<div class="search-list">
			<div class="nav-table">
				<div class="long-title"><span class="all-goods">全部分类</span>
				</div>
				<div class="nav-cont">
					<ul>
						<li class="index"><a href="#">首页</a></li>
                        <li class="qc"><a href="#">闪购</a></li>
                        <li class="qc"><a href="#">限时抢</a></li>
                        <li class="qc"><a href="#">团购</a></li>
                        <li class="qc last"><a href="#">大包装</a></li>
					</ul>
				</div>
			</div>
			
			<br/>
			<div class="am-g am-g-fixed">
				<div class="am-u-sm-12 am-u-md-12">
	       			<div class="theme-popover">
						<ul class="select">
							<p class="title font-normal">
								<span class="total fl">搜索到<strong class="num"><?php echo $totalRows;?></strong>件相关商品</span>
							</p>
							<div class="clear"></div>
							<li class="select-result">
								<dl>
									<dt>已选</dt>
									<dd class="select-no"></dd>
									<p class="eliminateCriteria">清除</p>
								</dl>
							</li>
							<div class="clear"></div>
							<li class="select-list">
								<dl id="select1">
									<dt class="am-badge am-round">品牌</dt>	
									<div class="dd-conent">										
										<dd class="select-all selected"><a href="#">全部</a></dd>
<!-- 										<dd><a href="#">百草味</a></dd>
										<dd><a href="#">良品铺子</a></dd>
										<dd><a href="#">新农哥</a></dd>
										<dd><a href="#">楼兰蜜语</a></dd>
										<dd><a href="#">口水娃</a></dd>
										<dd><a href="#">考拉兄弟</a></dd> -->
									</div>
								</dl>
							</li>
							<li class="select-list">
								<dl id="select2">
									<dt class="am-badge am-round">种类</dt>
									<div class="dd-conent">
										<dd class="select-all selected"><a href="#">全部</a></dd>
<!-- 										<dd><a href="#">东北松子</a></dd>
										<dd><a href="#">巴西松子</a></dd>
										<dd><a href="#">夏威夷果</a></dd>
										<dd><a href="#">松子</a></dd> -->
									</div>
								</dl>
							</li>
							<li class="select-list">
								<dl id="select3">
									<dt class="am-badge am-round">选购热点</dt>
									<div class="dd-conent">
										<dd class="select-all selected"><a href="#">全部</a></dd>
<!-- 										<dd><a href="#">手剥松子</a></dd>
										<dd><a href="#">薄壳松子</a></dd>
										<dd><a href="#">进口零食</a></dd>
										<dd><a href="#">有机零食</a></dd> -->
									</div>
								</dl>
							</li>
						</ul>
						<div class="clear"></div>
                    </div>
					<div class="search-content">
						<div class="sort">
							<li class="first"><a title="综合">综合排序</a></li>
						</div>
						<div class="clear"></div>
						<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
						<?php   if($rows):
								foreach($rows as $row):
								$imag = getProImgById($row['id']);
						?>

							<li>
								<div class="i-pic limit">
									<a href="proDetails.php?id=<?php echo $row['id'];?>"><img src="image_220/<?php echo $imag['albumPath'];?>"/></a>											
									<p class="title fl"><?php echo $row['pName'];?></p>
									<p class="price fl">
										<b>¥</b>
										<strong><?php echo $row['mPrice'];?></strong>
									</p>
								</div>
							</li>
						<?php endforeach;
								endif;
						?>

						</ul>
					</div>
<!-- 					<div class="search-side">
						<div class="side-title">
							经典搭配
						</div>
						<li>
							<div class="i-pic check">
								<img src="images/cp.jpg" />
								<p class="check-title">萨拉米 1+1小鸡腿</p>
								<p class="price fl">
									<b>¥</b>
									<strong>29.90</strong>
								</p>
								<p class="number fl">
									销量<span>1110</span>
								</p>
							</div>
						</li>
						<li>
							<div class="i-pic check">
								<img src="images/cp2.jpg" />
								<p class="check-title">ZEK 原味海苔</p>
								<p class="price fl">
									<b>¥</b>
									<strong>8.90</strong>
								</p>
								<p class="number fl">
									销量<span>1110</span>
								</p>
							</div>
						</li>
						<li>
							<div class="i-pic check">
								<img src="images/cp.jpg" />
								<p class="check-title">萨拉米 1+1小鸡腿</p>
								<p class="price fl">
									<b>¥</b>
									<strong>29.90</strong>
								</p>
								<p class="number fl">
									销量<span>1110</span>
								</p>
							</div>
						</li>
					</div> -->
					<div class="clear"></div>
							<!--分页 -->
					<ul class="am-pagination am-pagination-right">
<!-- 						<li class="am-disabled"><a href="#">&laquo;</a></li>
						<li class="am-active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li> -->
						<?php //if($totalRows>$pageSize):?>
								
								<?php echo showOtherPage($page, $totalPage,$id,"keywords={$keywords}");?>
							
						<?php //endif;?>
						<!-- <li><a href="#">&raquo;</a></li> -->

					</ul>
				</div>
			</div>
			<div class="footer">
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

		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>

		<!--菜单 -->

		<script>
			window.jQuery || document.write('<script src="basic/js/jquery-1.9.min.js"><\/script>');
		</script>
		<script type="text/javascript" src="basic/js/quick_links.js"></script>

<div class="theme-popover-mask"></div>

	</body>

</html>