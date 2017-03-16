<?php 
require_once 'include.php';
checkLogin();
$uid=(int)$_SESSION['loginFlag'];
$rows=getAllCart($uid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="css/optstyle.css" rel="stylesheet" type="text/css" />
		<link href="css/skin.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>

	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					<div class="menu-hd">
						<span>欢迎您</span><?php echo $_SESSION['username'];?>
						<a href="doAction.php?act=userOut">[退出]</a>
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
					<div class="menu-hd"><a id="mc-menu-hd" href="shopcart" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span></a></div>
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
					<a name="index_none_header_sysc" href="#"></a>
					<form action="doAction.php?act=search" method="post">
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>

					<tr class="item-list">
						<div class="bundle  bundle-last ">
							
							
							<div class="bundle-main">
							<?php foreach($rows as $row):
							$proImgs=getProImgsById($row['item_id']);
							$proInfo=getProById($row['item_id']);
							?>

								<ul class="item-content clearfix" data-id="<?php echo $row['id'];?>">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check addcheck" id="J_CheckBox_170037950254" name="items[]" value="170037950254" type="checkbox">
											<label for="J_CheckBox_170037950254"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="proDetails.php?id=<?php echo $row['item_id'];?>" target="_blank" data-title="<?php echo $proInfo['pName'];?>" class="J_MakePoint" data-point="tbcart.8.12">
												<img src="image_220/<?php  echo $proImgs[0]['albumPath'];?>" class="itempic J_ItemImg" width="80" height="80"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="proDetails.php?id=<?php echo $row['item_id'];?>" target="_blank" title="<?php echo $proInfo['pName'];?>" class="item-title J_MakePoint" data-point="tbcart.8.11"><?php echo $proInfo['pName'];?></a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span class="sku-line"><?php echo $row['sel1'];?></span><br/>
											<span class="sku-line"><?php echo $row['sel2'];?></span>
											
											<i class="theme-login am-icon-sort-desc"></i>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="J_Price price-now" tabindex="0"><?php echo $row['sprice'];?></em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="min am-btn" name="min" type="button" value="-" id="min" />
													<input class="text_box" name="num" type="text" value="<?php echo $row['num'];?>" style="width:30px;" />
													<input class="add am-btn" name="add" type="button" value="+" id="add" />
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="0" class="J_ItemSum number"><?php echo $row['num']*$row['sprice'];?></em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
										
											<a href="javascript:;" data-point-url="#" class="delete">删除</a>
										</div>
									</li>
								</ul>
									<?php endforeach?>
							</div>
						</div>
					
					</tr>
					<div class="clear"></div>

					
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price"><em id="J_Total">0.00</em></strong>
						</div>
						<div class="btn-area">
							<a href="pay.html" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>

				<script>
				$(".delete").each(function() {
					$(this).click(function() {
					if(window.confirm("确认删除")){
						var id = $('.item-content').attr('data-id');
						window.location="doAction.php?act=delCart&id="+id;
						} 
				});
				});
				$(".addcheck").each(function() {
					$(this).click(function() {
						var price_total = parseFloat($("#J_Total").text());
						if ($(this).attr('checked')=='checked') {
						price_total+=parseFloat($(this).parent().parent().parent().find('.J_ItemSum').text());
						$("#J_Total").text(price_total.toFixed(2));
					}else{
						price_total-=parseFloat($(this).parent().parent().parent().find('.J_ItemSum').text());
						$("#J_Total").text(price_total.toFixed(2));
					}
					});
				});
				$("#J_SelectAllCbx2").click(function() {
					var price_total = parseFloat($("#J_Total").text());
					if ($(this).attr("checked")=="checked") {
						price_total=0.00;
						$("#J_Total").text(price_total);
						$(".addcheck").each(function() {
							$(this).attr("checked","checked");
							price_total+=parseFloat($(this).parent().parent().parent().find('.J_ItemSum').text());
							$("#J_Total").text(price_total.toFixed(2));
						});
					}else{
						$(".addcheck").each(function() {
							$(this).attr("checked",false);
						});
						price_total=0.00;
						$("#J_Total").html(price_total.toFixed(2));
					}
				});
				$("input[name='add']") .each(function() {
					$(this).click(function() {
						var price = parseInt($(this).prev().attr('value'));
						var total =parseInt( $(this).parent().parent().parent().parent().parent().find('.J_ItemSum').text());
						var unprice = parseInt( $(this).parent().parent().parent().parent().parent().find('.J_Price').text());
						$(this).parent().parent().parent().parent().parent().find('.J_ItemSum').text(total+unprice);
					});
				});
				$("input[name='min']") .each(function() {
					$(this).click(function() {
						var price = parseInt($(this).prev().attr('value'));
						var total =parseInt( $(this).parent().parent().parent().parent().parent().find('.J_ItemSum').text());
						var unprice = parseInt( $(this).parent().parent().parent().parent().parent().find('.J_Price').text());
						if ($(this).next().attr('value')>0) {
						$(this).parent().parent().parent().parent().parent().find('.J_ItemSum').text(total-unprice);
					}
					});
				});
				</script>	
			</div><div class="footer">
					<div class="foot">
				<?php require_once 'foot.php';?>
			</div>
				</div>


			<!--操作页面-->

			
		
	</body>

</html>