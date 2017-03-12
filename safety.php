<?php
require_once 'include.php';
checkLogin();
$email = getUserEmail($_SESSION['loginFlag'])['email'];
$rows = getUserDetail($_SESSION['loginFlag'])[0];
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>安全设置</title>

		<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="css/skin.css" rel="stylesheet" type="text/css" />
		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="css/personal.css" rel="stylesheet" type="text/css">
		<link href="css/infstyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<?php require_once 'top.php'; ?>
				</div>
			</article>
		</header>
            <div class="nav-table">
				<?php require_once 'nav.php'; ?>
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<!--标题 -->
					<div class="user-safety">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
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

						<div class="check">
							<ul>
								<li>
									<i class="i-safety-lock"></i>
									<div class="m-left">
										<div class="fore1">登录密码</div>
										<div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
									</div>
									<div class="fore3">
										<a href="password.php">
											<div class="am-btn am-btn-secondary">修改</div>
										</a>
									</div>
								</li>

								<li>
									<i class="i-safety-iphone"></i>
									<div class="m-left">
										<div class="fore1">手机验证</div>
										<div class="fore2"><small>您验证的手机：<?php echo $rows['phone'];?> 若已丢失或停用，请立即更换</small></div>
									</div>
									<div class="fore3">
										<a href="bindphone.php">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>
								<li>
									<i class="i-safety-mail"></i>
									<div class="m-left">
										<div class="fore1">邮箱验证</div>
										<div class="fore2"><small>您验证的邮箱：<?php echo $email;?> 可用于快速找回登录密码</small></div>
									</div>
									<div class="fore3">
										<a href="email.php">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>

								
							</ul>
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