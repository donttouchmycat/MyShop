<?php
require_once 'include.php';
checkLogin();
$rows = getAllAddr();
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>地址管理</title>
		<link href="css/skin.css" rel="stylesheet" type="text/css" />
		<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="js/jDialog/jDialog.css" type="text/css">
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="css/personal.css" rel="stylesheet" type="text/css">
		<link href="css/addstyle.css" rel="stylesheet" type="text/css">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jDialog.js"></script>
		<script src="AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script type="text/javascript" src="js/jquery.cityselect.js"></script>
		<script src="js/Popt.js"></script>
		<script src="js/eduJson.js"></script>
		<script src="js/citySet.js"></script>
	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<div class="header">
						<ul class="message-l">
							<div class="topMessage">
							<span>欢迎您</span><?php echo $_SESSION['username'];?>
							<a href="doAction.php?act=userOut">[退出]</a>
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

						<div class="nav white" action="doAction.php?act=search" method="post">
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
			<?php require_once 'nav.php';?>
		</div>
		<b class="line"></b>

		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
							<?php foreach($rows as $row){
								if ($row['def'] == 1){?>
							<li class="user-addresslist defaultAddr">
								<span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
								<p class="new-tit new-p-re">
									<span class="new-txt"><?php echo $row['name'];?></span>
									<span class="new-txt-rd2"><?php echo $row['phone'];?></span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="province"><?php echo $row['province'];?></span>省
										<span class="city"><?php echo $row['city'];?></span>市
										<span class="dist"><?php echo $row['region'];?></span>区
										<span class="street"><?php echo $row['addesc'];?></span></p>
								</div>
								<div class="new-addr-btn">
									
									<a href="javascript:void(0);"  class="delete" onclick="del(<?php echo $row['id']?>)"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>
							<?php }else{?>
							<li class="user-addresslist">
								<span class="new-option-r" onclick="setdef(<?php echo $row['id']?>)"><i class="am-icon-check-circle"></i>设为默认</span>
								<p class="new-tit new-p-re">
									<span class="new-txt"><?php echo $row['name'];?></span>
									<span class="new-txt-rd2"><?php echo $row['phone'];?></span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="province"><?php echo $row['province'];?></span>省
										<span class="city"><?php echo $row['city'];?></span>市
										<span class="dist"><?php echo $row['region'];?></span>区
										<span class="street"><?php echo $row['addesc'];?></span></p>
								</div>
								<div class="new-addr-btn">
									
									<a href="javascript:void(0);"  class="delete" onclick="del(<?php echo $row['id']?>)"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>
							<?php }}?>
						</ul>
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" action="doAction.php?act=addr" method="post">

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name" placeholder="收货人" name="name">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" placeholder="手机号必填" type="tel" name="phone">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address" id="city_1">
												<select  class="prov" name="province"></select>
												<select  class="city" name="city"></select>
												<select  class="dist" name="region"></select>
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-name" class="am-form-label">所属院校</label>
											<div class="am-form-content">
												<input type="text" id="edu" placeholder="院校-系别">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="addesc"></textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<input class="am-btn am-btn-danger" value="保存" type="submit">
												
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							// $(".new-option-r").click(function(id) {
							// 	$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							// 	window.location="doAction.php?act=def&&id=<?php echo $row["id"]?>";
							// });
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
							$("#edu").click(function (e) {
								SelCity(this,e);
							});
						})
						$(function(){
							$("#city_1").citySelect({
    							prov:"广东", 
    							city:"广州",
								dist:"增城区",
								nodata:"none"
							}); 
						});
						function del(id){
							
								window.location="doAction.php?act=del&&id="+id;
						}
						function setdef(id) {
								window.location="doAction.php?act=def&&id="+id;
							}
							
						
					</script>

					<div class="clear"></div>

				</div>
				<!--底部-->
				<div class="footer">
			<div class="foot">
				<?php require_once 'foot.php';?>
			</div>

				</div>
			</div>

			<?php require_once 'site.php';?>
		</div>

	</body>

</html>