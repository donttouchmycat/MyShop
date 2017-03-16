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

function getSprice($path,$id){
	$sql="select sprice from attr_path where symbol_path='{$path}' and item_id={$id}";
	$rows = fetchAll($sql);
	echo  $rows['0']['sprice'];
}

function addCart($row){
	insert("my_cart", $row);

}

function getAllCart($id){
	$sql="select * from my_cart where uid={$id}";
	$rows = fetchAll($sql);
	return $rows;
}

function delCart($id){
	$sql="delete from my_cart where id={$id}";
	$result = fetchOne($sql);
	echo "<script>window.location='shopcart.php';</script>";

}
