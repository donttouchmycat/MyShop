<?php
function addCate(){
	$arr = $_POST;
	if (insert("my_cate",$arr)){
		$mes = "分类添加成功<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
	}else {
		$mes = "分类添加失败<br/><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
	}
	return $mes;
}

function getCateById($id){
	$sql = "select id,cName from my_cate where id={$id}";
	return fetchOne($sql);
}

function editCate($where){
	$arr=$_POST;
	if (update("my_cate", $arr,$where)) {
		$mes = "分类修改成功<br/><a href='listCate.php'>查看分类</a>";
	}else {
		$mes = "分类修改失败<br/><a href='listCate.php'>查看分类</a>";
	}
	return $mes;
}

function delCate($id){
	$res=checkProExist($id);
	if (!$res){
		$where="id=".$id;
		if (delete("my_cate",$where)){
			$mes = "分类删除成功<br/><a href='listCate.php'>查看分类</a>";
			}else {
				$mes = "删除失败<br/><a href='listCate.php'>查看分类</a>";
			}
		return $mes;
	}else{
		alertMes("不能删除分类请先删除分类下的商品", "listPro.php");
	}

}

function getAllCate(){
	$sql="select id,cName from my_cate";
	$rows = fetchAll($sql);
	return $rows;
}
