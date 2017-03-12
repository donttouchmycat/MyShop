<?php
function search(){
	@$key = $_REQUEST['key'];
	echo "<script>window.location='search.php?keywords={$key}';</script>";
}
function checkLogin(){

if ((!isset($_SESSION['loginFlag']) || $_SESSION['loginFlag']=="")){
	alertMes("请先登录", "login.php");
	}

}

