<?php
require_once 'include.php';
@$act = $_REQUEST['act'];
if ($act == "login"){
	$mes = login();
}elseif($act == 'userOut'){
	$mes = userout();
}elseif($act == 'reg'){
	$mes = reg();
}elseif($act == 'search'){
	search();
}

if($mes){
	echo $mes;
}