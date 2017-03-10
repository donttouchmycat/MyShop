<?php
function checkAdmin($sql){
	$link = connect();
	return fetchOne($sql);
}

function checkLogined(){
if ((!isset($_SESSION['adminId']) || $_SESSION['adminId']=="")

        && (!isset($_COOKIE['adminId']) || $_COOKIE['adminId']=="")){

		alertMes("请先登录", "login.php");

	}
}

function addAdmin(){
	$arr = $_POST;
	$arr['password'] = md5($_POST['password']);
	if(insert("my_admin",$arr)){
		$mes = "添加成功!<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes = "添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
	}
	return $mes;
}

function getAllAdmin(){

	$sql = "select id,username,email from my_admin";
	$rows = fetchAll($sql);
	return $rows;
}


function editAdmin($id){
	$arr = $_POST;
	$arr['password'] = md5($_POST['password']);
	if (update("my_admin", $arr,"id={$id}")) {
		$mes = "编辑成功!<a href='listAdmin.php'>查看管理员列表</a>";
	}else{
		$mes = "编辑失败!<a href='listAdmin.php'>重新修改</a>";
	}
	return $mes;
}

function delAdmin($id){
	if (delete("my_admin","id={$id}")){
		$mes = "删除成功<a href='listAdmin.php>查看管理员列表</a>";
	}else {
		$mes = "删除失败<a href='listAdmin.php>重新删除</a>";
	}
	return $mes;
}
function logout(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if (isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if (isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	session_destroy();
	header("location:login.php");
}

function addUser(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$arr['regTime']=time();
	if(insert("my_user", $arr)){
		$mes="添加成功!<br/><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看列表</a>";
	}else{
		$mes="添加失败!<br/><a href='arrUser.php'>重新添加</a>|<a href='listUser.php'>查看列表</a>";
	}
	return $mes;
}

function editUser($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$where="id={$id}";
	$arr['id']=$id;
	$del=delete("my_user",$where);
	$res=insert("my_user", $arr);
	if($res){
		$mes="编辑成功!<br/><a href='listUser.php'>查看用户列表</a>";
	}else{
		$mes="编辑失败!<br/><a href='listUser.php'>请重新修改</a>";
	}
	return $mes;
}

function delUser($id){
	if(delete("my_user","id={$id}")){
		$mes="删除成功!<br/><a href='listUser.php'>查看用户列表</a>";
	}else{
		$mes="删除失败!<br/><a href='listUser.php'>请重新删除</a>";
	}
	return $mes;
}