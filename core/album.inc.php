<?php
function addAlbum($arr){
	insert("my_album", $arr);
}

function getProImgById($id){
	$sql="select albumPath from my_album where pid={$id} limit 1";
	$row=fetchOne($sql);
	return $row;
}

function getProImgsById($id){
	$sql="select albumPath from my_album where pid={$id} ";
	$rows=fetchAll($sql);
	return $rows;
}