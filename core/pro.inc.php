<?php
function addPro(){
	$arr = $_POST;
	$arr['pubTime'] = time();
	$path = "./uploads";
	$uploadFiles = uploadFile($path);
	if (is_array($uploadFiles&&$uploadFiles)){
		foreach ($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$res = insert("my_pro",$arr);
	if ($res){
		foreach ($uploadFiles as $uploadFile){
			$arr1['pid'] = $res;
			$arr1['albumPath'] = $uploadFile['name'];
			addAlbum($arr1);
		}
		$mes="<p>添加成功</p><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看商品</a>";
	}else{
		foreach ($uploadFiles as $uploadFile){
			if (file_exists("../image_800/".$uploadFile['name'])){
				unlink("../image800".$uploadFile['name']);
			}
			if (file_exists("../image_50/".$uploadFile['name'])){
				unlink("../image50".$uploadFile['name']);
			}
			if (file_exists("../image_220/".$uploadFile['name'])){
				unlink("../image220".$uploadFile['name']);
			}
			if (file_exists("../image_350/".$uploadFile['name'])){
				unlink("../image3500".$uploadFile['name']);
			}
		}
		$mes="<p>添加失败</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
	}
	return $mes;
}

function editPro($id){
	$arr=$_POST;
	$path="./uploads";
	$uploadFiles=uploadFile($path);
	if(is_array($uploadFiles)&&$uploadFiles){
		foreach($uploadFiles as $key=>$uploadFile){
			thumb($path."/".$uploadFile['name'],"../image_50/".$uploadFile['name'],50,50);
			thumb($path."/".$uploadFile['name'],"../image_220/".$uploadFile['name'],220,220);
			thumb($path."/".$uploadFile['name'],"../image_350/".$uploadFile['name'],350,350);
			thumb($path."/".$uploadFile['name'],"../image_800/".$uploadFile['name'],800,800);
		}
	}
	$where="id={$id}";
	$res=update("my_pro",$arr,$where);
	$pid=$id;
	if($res&&$pid){
		if($uploadFiles &&is_array($uploadFiles)){
			foreach($uploadFiles as $uploadFile){
				$arr1['pid']=$pid;
				$arr1['albumPath']=$uploadFile['name'];
				addAlbum($arr1);
			}
		}
		$mes="<p>编辑成功!</p><a href='listPro.php' target='mainFrame'>查看商品列表</a>";
	}else{
		if(is_array($uploadFiles)&&$uploadFiles){
			foreach($uploadFiles as $uploadFile){
				if(file_exists("../image_800/".$uploadFile['name'])){
					unlink("../image_800/".$uploadFile['name']);
				}
				if(file_exists("../image_50/".$uploadFile['name'])){
					unlink("../image_50/".$uploadFile['name']);
				}
				if(file_exists("../image_220/".$uploadFile['name'])){
					unlink("../image_220/".$uploadFile['name']);
				}
				if(file_exists("../image_350/".$uploadFile['name'])){
					unlink("../image_350/".$uploadFile['name']);
				}
			}
		}
		$mes="<p>编辑失败!</p><a href='listPro.php' target='mainFrame'>重新编辑</a>";

	}
	return $mes;
}

function getAlProByAdmin(){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from my_pro as p join my_cate c on p.cId=c.id";
	$rows=fetchAll($sql);
	return $rows;
}

function getAllImgByProId($id){
	$sql="select a.albumPath from my_album a where pid={$id}";
	$rows=fetchAll($sql);
	return $rows;
}

function getProById($id){
		$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from my_pro as p join my_cate c on p.cId=c.id where p.id={$id}";
		$row=fetchOne($sql);
		return $row;
}