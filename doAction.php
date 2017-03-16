<?php
require_once 'include.php';
$mes=null;
@$act = $_REQUEST['act'];
@$id=$_REQUEST['id'];
if ($act == "login"){
	$mes = login();
}elseif($act == 'userOut'){
	$mes = userout();
}elseif($act == 'reg'){
	$mes = reg();
}elseif($act == 'search'){
	search();
}elseif($act == 'updateUser'){
	updateUser();
}elseif($act == "editpa"){
	$mes = editpassword();
}elseif($act == "addr"){
	addAddr();
}elseif($act == "def"){
	setDef($id);
}elseif ($act == "del"){
	delDef($id);
}elseif ($act == "sech"){
	$path=$_REQUEST['path'];
	getSprice($path, $id);
}elseif($act == "addCart"){
	$row['num'] = $_REQUEST['num'];
	$row['sprice'] = $_REQUEST['price'];
	$row['uid']  =$_REQUEST['uid'];
	$row['sel1'] = $_REQUEST['sel1'];
	$row['item_id'] = $id;
	$row['sel2'] = $_REQUEST['sel2'];
	//print_r($row);
	addCart($row);
}elseif($act=="delCart"){
	delCart($id);
}

if($mes){
	echo $mes;
}