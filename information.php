<?php 
require_once 'include.php';
checkLogin();
$rows = getUserDetail($_SESSION['loginFlag'])[0];
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
				<?php require_once 'top.php';?>
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
								<div><b>用户名：<i>#<?php echo $rows['uid'];?></i></b></div>
								<div class="u-safety">

									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">性别:<?php echo $rows['sex']?></i></span>

								</div>
							</div>

						</div>

						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal" action="doAction.php?act=updateUser" method="post">

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="aname" value="<?php echo $rows['aname']?>">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="rname" value="<?php echo $rows['rname']?>">


									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="男" data-am-ucheck <?php echo $rows['sex']=="男"?"checked='checked'":null;?>> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="女" data-am-ucheck <?php echo $rows['sex']=="女"?"checked='checked'":null;?>> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="保密" data-am-ucheck <?php echo $rows['sex']=="保密"?"checked='checked'":null;?>> 保密
										</label>
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<div class="birth-select">
											<select name="year">
												<?php
  													for ( $i = 1949; $i <= 2017; $i++  ) {
  														if ($i==$rows['year']) {?>
  															<option value="<?php echo $i;?>" checked="true"><?php echo $i;?></option>
  														<?php }else{ ?>
 												
 													<option value="<?php echo $i;?>"><?php echo $i;?></option>
												<?php
													}
												}
												?>
											</select>
											<em>年</em>
										</div>
										<div class="birth-select2">
											<select name="month">
												<?php
  													for ( $i = 1; $i <= 12; $i++  ) {
  														if ($i==$rows['year']) {?>
  															<option value="<?php echo $i;?>" checked="true"><?php echo $i;?></option>
  														<?php }else{ ?>
 												
 													<option value="<?php echo $i;?>"><?php echo $i;?></option>
												<?php
													}
												}
												?>
											</select>
											<em>月</em></div>
										<div class="birth-select2">
											<select name="day">
												<?php
  													for ( $i = 1; $i <= 30; $i++  ) {
  														if ($i==$rows['year']) {?>
  															<option value="<?php echo $i;?>" checked="true"><?php echo $i;?></option>
  														<?php }else{ ?>
 												
 													<option value="<?php echo $i;?>"><?php echo $i;?></option>
												<?php
													}
												}
												?>
											</select>
											<em>日</em></div>
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" type="tel" name="phone" value="<?php echo $rows['phone']?>">

									</div>
								</div>
								<div class="info-btn">
									<input class="am-btn am-btn-danger" value="保存修改" type="submit">
								</div>

							</form>
						</div>

					</div>

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
<script>
console.log();
</script>