<?php
function reg(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$arr['regTime']=time();
	if(insert("my_user", $arr)){
		$mes="注册成功!<br/><meta http-equiv='refresh' content='0;url=login.php'/>";
	}else{
		$mes="注册失败!<br/><a href='reg.php'>重新注册</a>|<a href='index.php'>查看首页</a>";
	}
	return $mes;
}
function login(){
	$username=$_POST['username'];
	//addslashes():使用反斜线引用特殊字符
	//$username=addslashes($username);
	$username=$username;
	$password=md5($_POST['password']);
	$sql="select * from my_user where username='{$username}' and password='{$password}'";
	//$resNum=getResultNum($sql);
	$row=fetchOne($sql);
	//echo $resNum;
	if($row){
		$_SESSION['loginFlag']=$row['id'];
		$_SESSION['username']=$row['username'];
		$mes="<meta http-equiv='refresh' content='0;url=index.php'/>";
	}else{
		$mes="登陆失败！<a href='login.php'>重新登陆</a>";
	}
	return $mes;
}

function userOut(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}

	session_destroy();
	header("location:index.php");
}

function editpassword(){
	$id=$_SESSION['loginFlag'];
	$arr = $_POST;
	$row['password'] = md5($arr['newname']);
	if ($arr['oldname'] == $arr['newname']){
		$mes="<script>window.location='password.php';alert('修改失败');</script>";
	}elseif ($arr['newname'] != $arr["repeatname"]){
		$mes="<script>window.location='password.php';alert('修改失败');</script>";
	}else{
		$link = connect();
		$sql = "update my_user set password = '{$row['password']}' where id = {$id}";
		$reslut = mysqli_query($link,$sql);
		mysqli_close($link);
		if ($reslut){
			$mes="<script>window.location='login.php';alert(修改成功！);</script>";
		}else {
			$mes="<script>window.location='password.php';alert('修改失败');</script>";
		}
	}
	return $mes;


}
function getUserDetail($id){
	$sql = "select uid,year,month,day,aname,rname,phone,sex,id from my_userdet where uid={$id}";
	$rows = fetchAll($sql);
	return $rows;
}
function getUserEmail($id){
	$sql = "select email from my_user where id={$id}";
	$res = fetchOne($sql);
	return $res;
}
function updateUser(){
	$arr=$_POST;
	$id=$_SESSION['loginFlag'];
	$sql="select * from my_userdet where uid={$id}";
	$arr['uid']=$id;
	print_r($arr);
	if (fetchOne($sql)){
		$where = "uid={$id}";
		delete("my_userdet",$where);
		$res=insert("my_userdet", $arr);
	}else{
		$res=insert("my_userdet", $arr);
	}
	echo "<script>window.location='information.php';</script>";
}

function addAddr(){
	$arr = $_POST;
	$id = $_SESSION['loginFlag'];
	$arr['aid'] = $id;
	insert("address", $arr);
	echo "<script>window.location='address.php';</script>";
}
function getAllAddr(){
	$id = $_SESSION['loginFlag'];
	$sql = "select * from address where aid={$id}";
	$rows =fetchAll($sql);
	return $rows;

}

function setDef($id){
	$link = connect();
	$sql = "update address set def=0 where aid={$_SESSION['loginFlag']}";
	$row = mysqli_query($link,$sql);
	$sqll = "update address set def=1 where id={$id}";
	$roww = mysqli_query($link,$sqll);
	echo "<script>window.location='address.php';</script>";
}

function delDef($id){
	$where="id={$id}";
	delete("address",$where);
	echo "<script>window.location='address.php';</script>";
}