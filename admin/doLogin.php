<?php
require_once '../include.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
@$autoFlag = $_POST['autoFlag'];
if ($verify == $verify1){
	$sql = "select * from my_admin where username = '{$username}' and password = '{$password}'";
	$res = checkAdmin($sql);	
	if ($res){
		if ($autoFlag){
			setcookie("adminId",$res['id'],time()+7*24*3600);
			setcookie("adminName",$res['username'],time()+7*24*3600);
		}
		$_SESSION['adminName'] = $res['username'];
		$_SESSION['adminId'] = $res['id'];
		//header("localtion:index.php");
		alertMes("登录成功", "index.php");
	}else{
		alertMes("登录失败", "login.php");
	}
}else {
	alertMes("验证码错误", "login.php");
}