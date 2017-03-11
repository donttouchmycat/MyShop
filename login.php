<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link href="css/skin.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="css/dlstyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="index.php"><img alt="logo" src="images/logo-bigger.jpg" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="images/big.jpg" /></div>
				<div class="login-box">
                    <h3 class="title">登录商城</h3>
                    <div class="clear"></div>
					<div class="login-form">
						<form method="post" action="doAction.php?act=login">
							<div class="user-name">
								<label for="user"><i class="am-icon-user"></i></label>
								<input type="text" name="username" id="user" placeholder="邮箱/手机/用户名">
                            </div>
                            <div class="user-pass">
								<label for="password"><i class="am-icon-lock"></i></label>
								<input type="password" name="password" id="password" placeholder="请输入密码">
								<div class="am-cf">
									<input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
								</div>
                            </div>
                        </form>
                    </div>
                    <div class="login-links">
						<a href="reg.php" class="zcnext am-fr am-btn-default">注册</a>
						<br />
                    </div>

					<div class="partner">
						<div class="am-btn-group">
							<li><a href="#" onfocus="this.blur();"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
							<li><a href="#" onfocus="this.blur();"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
							<li><a href="#" onfocus="this.blur();"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="footer" id="notbord">
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
	</body>

</html>