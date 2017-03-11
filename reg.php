<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link href="css/skin.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="index.php"><img alt="" src="images/logo.jpg" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="images/big.jpg" /></div>
				<div class="login-box">
					<div class="am-tabs" id="doc-my-tabs">
						<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
							<li class="am-active">注册</li>
							<!-- <li><a href="" onfocus="this.blur();">手机号注册</a></li> -->
						</ul>
						<div class="am-tabs-bd">
							<div class="am-tab-panel am-active">
								<form method="post" action="doAction.php?act=reg" onsubmit="return check();">
									<div class="user-email">
										<label for="email"><i class="am-icon-lock"></i></label>
										<input type="username" name="username" id="username" placeholder="请输入账号">
                					</div>										
                 					<div class="user-pass">
								    	<label for="password"><i class="am-icon-lock"></i></label>
								    	<input type="password" name="password" id="password" placeholder="设置密码">
                 					</div>										
                	 				<div class="user-pass">
								    	<label for="passwordRepeat"><i class="am-icon-envelope-o"></i></label>
								    	<input type="email" name="email" id="email" placeholder="输入邮箱">
                 					</div>	
                 					
                 				
								
								<div class="am-cf">
									<input type="submit" id="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl" disabled="disabled" >
								</div></form><div class="login-links">
									<label for="reader-me">
										<input id="reader-me" type="checkbox" onclick="v_submitbutton();"> 点击表示您同意商城《服务协议》
									</label>
							  	</div>
							</div>
<!-- 							<div class="am-tab-panel">
								<form method="post" action="doAction.php?act=reg" onsubmit="return check();">
                 					<div class="user-phone">
								    	<label for="phone"><i class="am-icon-lock"></i></label>
								    	<input type="tel" name="username" id="phone" placeholder="请输入手机号">
                 					</div>																			
                 					<div class="user-pass">
								    	<label for="password"><i class="am-icon-lock"></i></label>
								    	<input type="password" name="password" id="password" placeholder="设置密码">
                 					</div>										
                 					<div class="user-pass">
								    	<label for="passwordRepeat"><i class="am-icon-envelope-o"></i></label>
								    	<input type="password" name="email" id="email" placeholder="输入邮箱">
                 					</div>	
								
								
								<div class="am-cf">
									<input type="submit" id="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl" disabled="disabled" >
								</div>
								</form>
								<div class="login-links">
									<label for="reader-me">
										<input id="reader-me" type="checkbox" onclick="v_submitbutton();"> 点击表示您同意商城《服务协议》
									</label>
							  	</div>
								<hr/>
							</div> -->
							<script>
$(function() {
	$('#doc-my-tabs').tabs();
})
function enableSubmit(bool){
	if(bool){$("#submit").removeAttr("disabled")
	}else {
		$("#submit").prop("disabled","ture")
	}
}
function v_submitbutton(){
	if(!$("#reader-me").prop("checked")) {
		enableSubmit(false);
	}else{
		enableSubmit(true);
	}
	
}
function check(){
	if(v_account()&&v_name()&&v_password()){
		return true;
	}else{
		return false;
	}
}
//邮箱验证，网上找到的正则
var RegEmail = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
function v_account(){
	var account = $("#email").val();
	if(!RegEmail.test(account)) {alert("邮箱格式不正确"); return false;}
	return true;
}
function v_name(){
	var name = $("#username").val();
	console.log($("#username").val());
	if(name.length==0) {
		alert("不得为空"); 
		return false;
	}else{
		if(name.length>32) {
			alert("name","error","必须少于32个字符"); 
			return false;
		}else{
			return true;
		}
	}
}
function v_password(){
	var password = $("#password").val();
	if(password.length<6) {
		alert("password","error","必须多于或等于6个字符"); 
		return false;
	}else{
		if(password.length>16){
			alert("password","error","必须少于或等于16个字符"); 
		}else{
			return true;
		}
	}
}
							</script>
						</div>
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
		</div>
	</body>

</html>