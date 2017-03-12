<?php
require_once 'include.php';
$mes=null;
@$act = $_REQUEST['act'];
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
	$id = $_REQUEST['id'];
	setDef($id);
}elseif ($act="del"){
	$id = $_REQUEST['id'];
	delDef($id);
}

if($mes){
	echo $mes;
}