<?php
function connect(){
	$link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("数据库连接失败Erro:".mysqli_errno($link).":".mysqli_error($link));
	mysqli_set_charset($link, DB_CHARSET);
	return $link;
}
/**
 * 插入记录
 * @param string $table
 * @param array $array
 * @return number
 */
function insert($table,$array){
	$link = connect();
	$key = join(",", array_keys($array));
	$vals="'".join("','",array_values($array))."'";
	$sql="insert {$table}($key) values({$vals})";
	mysqli_query($link, $sql);
	return mysqli_insert_id($link);
	mysqli_close($link);
}

/**
 * 更新记录
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function update($table,$array,$where=null){
	$link = connect();
	$str = '';
	foreach ($array as $key => $val){
		if($val == null){
			$sep = "";
		}else{
			$sep = ",";
		}
		$str.= $key."='".$val."'".$sep;
	}
	$str=rtrim($str,",");
	$sql = "update {$table} set {$str} ".($where==null?null:"where ".$where);
	$reslut = mysqli_query($link,$sql);
	if ($reslut){
		return mysqli_affected_rows($link);
	}else {
		return false;
	}
	mysqli_close($link);
}

/**
 * 删除记录
 * @param string $table
 * @param string $where
 * @return number
 */
function delete($table,$where = null){
	$link = connect();
	$where = $where == null?null:"where ".$where;
	$sql = "delete from {$table} {$where}";
	mysqli_query($link,$sql);
	return mysqli_affected_rows($link);
	mysqli_close($link);
}

/**
 * 得到一条记录
 * @param stringtring $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
	$link = connect();
	$result = mysqli_query($link,$sql);
	if (!$result){
		return null;
	}
	@$row = mysqli_fetch_array($result,$result_type);
	return $row;
	mysqli_close($link);
}

/**
 * 得到所有记录
 * @param string $sql
 * @param string $result_type
 * @return unknown
 */
function fetchAll($sql,$result_type = MYSQLI_ASSOC){
	$link = connect();
	$result = mysqli_query($link,$sql);
	if (!$result){
		return null;
	}
	while($row = mysqli_fetch_array($result,$result_type)){
		$rows[] = $row;
	}
	return $rows;
	mysqli_close($link);
}

/**
 * 得到记录条数
 * @param string $sql
 * @return number
 */
function getResultNum($sql){
	$link = connect();
	$result = mysqli_query($link,$sql);
	if (!$result){
		return null;
	}
	return mysqli_num_rows($result);
	mysqli_close($link);
}
