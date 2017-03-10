<?php
function buildInfo(){
	if (!$_FILES){
		return null;
	}else{
		foreach ($_FILES as $v){
			foreach ($v as $key=>$val){
				foreach ($val as $k=>$info){
					$infos[$k][$key] = $info;
				}
			}
		}
	return $infos;
	}
}
function uploadFile($imgFlag=true,$maxSize = 2097152,$path="uploads",$allowExt=array("gif","jpeg","jpg","png","wbmp")){
	if (!file_exists($path)){
		mkdir($path,0777,true);
	}
	$i=0;
	$files=buildInfo();
	if ($files){
		foreach ($files as $file){
			if ($file['error'] == UPLOAD_ERR_OK){
				$ext=getExt($file['name']);
				if (!in_array($ext,$allowExt)){
					exit("非法类型");
				}
				if ($file['size']>$maxSize){
					exit("文件过大");
				}
				if ($imgFlag){
					$info=getimagesize($file['tmp_name']);
					//var_dump($info);
					if (!$info){
						exit("不是真正图片类型");
					}
				}
				$filename=getUniName().".".$ext;
				$destination=$path."/".$filename;
				if (is_uploaded_file($file['tmp_name'])){
					if (move_uploaded_file($file['tmp_name'], $destination)){
						$file['name']=$filename;
						unset($file['error'],$file['tmp_name'],$file['size'],$file['type']);
						$uploadedFiles[$i]=$file;
						$i++;
					}
				}else {
					exit("文件不是通过HTTP POST上传上来的");
				}
			}else {
				switch ($file['error']){
					case 1:
						$mes = "超过表单配置文件上传文件大小";
						break;
					case 2:
						$mes = "超过表单设置上传文件大小";
						break;
					case 3:
						$mes = "文件部分被上传";
						break;
					case 4:
						$mes = "没有文件被上传";
						break;
					case 6:
						$mes = "没有找到临时目录";
						break;
					case 7:
						$mes = "文件不可写";
						break;
					case 8:
						$mes = "由于扩展程序中断了文件上传";
						break;
				}
				echo $mes;
			}
		}
		return $uploadedFiles;
	}else{
		return null;
	}
}