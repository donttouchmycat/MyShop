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

function addspc($id){
	$where = "item_id={$id}";
	delete("attr_key",$where);
	delete("attr_val",$where);
	delete("attr_path",$where);
	foreach ($_POST['sp'] as $arr){
		$sql="insert attr_key(item_id,attr_name) values('{$id}','{$arr}')";


		fetchOne($sql);
	}
	$i=1;
	foreach ($_POST['spc'] as $arr){
		$a[]=$i;
		$sql="insert attr_val(key_id,item_id,symbol,attr_value) values('1','{$id}','{$i}','{$arr}')";
		$i++;

		fetchOne($sql);

	}
	foreach ($_POST['selec'] as $arr){
		$b[]=$i;
		$sql="insert attr_val(key_id,item_id,symbol,attr_value) values('2','{$id}','{$i}','{$arr}')";
		$i++;
		fetchOne($sql);

	}
	foreach ($a as $q){
		foreach ($b as $r){
			$y[]="{$q},{$r}";

		}
	}
	$i=0;
	foreach ($_POST['sprice'] as $arr){
				$sql="insert attr_path(item_id,sprice,symbol_path) values('{$id}','{$arr}','{$y[$i]}')";
				$i++;

				fetchOne($sql);


			}
			$mes="编辑成功!<br/><a href='listUser.php'>查看用户列表</a>";
			return $mes;
}

function getAllSpc($id){
	$sql="select attr_name from attr_key where item_id={$id}";
	$rows = fetchAll($sql);
	return $rows;
}

function getOneSel($id){
	$sql="select attr_value,symbol from attr_val where item_id={$id} and key_id='1'";
	$rows = fetchAll($sql);
	return $rows;
}
function getTowSel($id){
	$sql="select attr_value,symbol from attr_val where item_id={$id} and key_id='2'";
	$rows = fetchAll($sql);
	return $rows;
}
function getPrice($a,$b,$id){
	$sql="select sprice from attr_path where symbol_path='{$a},{$b}' and item_id={$id}";
	$rows = fetchAll($sql);
	return $rows['0']['sprice'];
}