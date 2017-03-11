<?php 
require_once 'include.php';
checkLogin();
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人资料</title>

		<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="css/skin.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="css/personal.css" rel="stylesheet" type="text/css">
		<link href="css/infstyle.css" rel="stylesheet" type="text/css">
		<script src="AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
			
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
							<span>欢迎您</span><?php echo $_SESSION['username'];?>
							<a href="doAction.php?act=userOut">[退出]</a>
							</div>
						</ul>
						<ul class="message-r">
							<div class="topMessage home">
								<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
							</div>
							<div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>

						<!--悬浮搜索框-->

						<div class="nav white">
							<div class="logoBig">
								<li><img src="images/logo.jpg" /></li>
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
					</div>
				</div>
			</article>
		</header>
            <div class="nav-table">
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
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img class="am-circle am-img-thumbnail" src="images/getAvatar.do.jpg" alt="" />
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>小叮当</i></b></div>
							</div>
						</div>

						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal">

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="user-name2">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input type="text" id="user-name2">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="radio10" value="male" data-am-ucheck> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="radio10" value="female" data-am-ucheck> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="radio10" value="secret" data-am-ucheck> 保密
										</label>
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<div class="birth-select">
											<select>
												<option>2015</option>
												<option>2014</option>
												<option>2013</option>
												<option>2012</option>
												<option>2011</option>
												<option>2010</option>
												<option>2009</option>
												<option>2008</option>
												<option>2007</option>
												<option>2006</option>
												<option>2005</option>
												<option>2004</option>
												<option>2003</option>
												<option>2002</option>
												<option>2001</option>
												<option>2000</option>
												<option>1999</option>
												<option>1998</option>
												<option>1997</option>
												<option>1996</option>
												<option>1995</option>
												<option>1994</option>
												<option>1993</option>
												<option>1992</option>
												<option>1991</option>
												<option>1990</option>
												<option>1989</option>
												<option>1989</option>
												<option>1988</option>
												<option>1987</option>
												<option>1986</option>
												<option>1985</option>
												<option>1984</option>
												<option>1983</option>
												<option>1982</option>
												<option>1981</option>
												<option>1980</option>
												<option>1979</option>
												<option>1978</option>
												<option>1977</option>
												<option>1976</option>
												<option>1975</option>
												<option>1974</option>
												<option>1973</option>
												<option>1972</option>
												<option>1971</option>
												<option>1970</option>
												<option>1969</option>
												<option>1968</option>
												<option>1967</option>
											</select>
											<em>年</em>
										</div>
										<div class="birth-select2">
											<select>
												<option>12</option>
												<option>11</option>
												<option>10</option>
												<option>9</option>
												<option>8</option>
												<option>7</option>
												<option>6</option>
												<option>5</option>
												<option>4</option>
												<option>3</option>
												<option>2</option>
												<option>1</option>
											</select>
											<em>月</em></div>
										<div class="birth-select2">
											<select>
												<option>31</option>
												<option>30</option>
												<option>29</option>
												<option>28</option>
												<option>27</option>
												<option>26</option>
												<option>25</option>
												<option>24</option>
												<option>23</option>
												<option>22</option>
												<option>21</option>
												<option>20</option>
												<option>19</option>
												<option>18</option>
												<option>17</option>
												<option>16</option>
												<option>15</option>
												<option>14</option>
												<option>13</option>
												<option>12</option>
												<option>11</option>
												<option>10</option>
												<option>9</option>
												<option>8</option>
												<option>7</option>
												<option>6</option>
												<option>5</option>
												<option>4</option>
												<option>3</option>
												<option>2</option>
												<option>1</option>
											</select>
											<em>日</em></div>
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" type="tel">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" type="email">

									</div>
								</div>
								<div class="info-btn">
									<input class="am-btn am-btn-danger" value="保存修改">
								</div>

							</form>
						</div>

					</div>

				</div>
				<!--底部-->
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

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="index.html">个人中心</a>
					</li>
					<li class="person">
						<p>个人资料</p>
						<ul>
							<li class="active"> <a href="information.html">个人信息</a></li>
							<li> <a href="safety.html">安全设置</a></li>
							<li> <a href="address.html">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<p>我的交易</p>
						<ul>
							<li><a href="order.html">订单管理</a></li>
							<li> <a href="change.html">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<p>我的资产</p>
						<ul>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<p>我的小窝</p>
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