<?php
require_once '../include.php';
@$act = $_REQUEST['act'];
@$id = $_REQUEST['id'];
if ($act == "logout"){
	logout();
}elseif ($act == "addAdmin"){
	$mes = addAdmin();
	if($mes){
		echo $mes;
	}
}elseif ($act == "editAdmin"){
	$mes = editAdmin($id);
}elseif ($act == "delAdmin"){
	$mes = delAdmin($id);
}elseif ($act == "addCate"){
	$mes = addCate();
}elseif ($act == "editCate"){
	$where="id={$id}";
	$mes = editCate($where);
}elseif($act == "delCate"){
	$mes=delCate($id);
}elseif ($act == "addPro"){
	$mes = addPro();
}elseif($act == "editPro"){
	$mes = editPro($id);
}elseif ($act == "delPro"){
	$mes = delPro($id);
}elseif ($act=="addUser"){
	$mes = addUser();
}elseif($act=="editUser"){
	$mes=editUser($id);
}elseif($act=="delUser"){
		$mes=delUser($id);
}elseif($act="wstore"){
	$mes=addspc($id);
}

if(@$mes){
	echo $mes;
}