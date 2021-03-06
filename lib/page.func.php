<?php

function showPage($page,$totalPage,$where = null){
	$where = ($where == null)?null:"&".$where;
	$url = $_SERVER['PHP_SELF'];
	$index = ($page == 1)?"首页":"<a href='{$url}?page=1{$where}'>首页</a>";
	$last = ($page == $totalPage)?"尾页":"<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
	$prev = ($page == 1)?"上一页":"<a href='{$url}?page=".($page-1)."{$where}'>上一页</a>";
	$next = ($page == $totalPage)?"下一页":"<a href='{$url}?page=".($page+1)."{$where}'>下一页</a>";
	$str = "共{$totalPage}页/当前第{$page}页";
	$p = "";
	for($i = 1; $i <= $totalPage; $i ++) {
		//当前页无连接
		if ($page == $i) {
			$p.="[{$i}]";
		} else {
			$p.="<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
		}
	}
	return $str."<br/>".$index.$prev.$p.$next.$last;
}

function showOtherpage($page,$totalPage,$id,$where){
	$where = ($where == null)?null:"&".$where;
	$url = $_SERVER['PHP_SELF'];
	$prev = ($page == 1)?"<li class='am-disabled'><a>&laquo;</a></li>":"<li><a href='{$url}?page=".($page-1)."&&id={$id}&&{$where}'>&laquo;</a></li>";
	$next = ($page == $totalPage)?"<li class='am-disabled'><a>&raquo;</a></li>":"<li><a href='{$url}?page=".($page+1)."&&id={$id}&&{$where}'>&raquo;</a></li>";
	$p = "";
	for($i = 1; $i <= $totalPage; $i ++) {
		//当前页无连接
		if ($page == $i) {
			$p.="<li class='am-active'><a>".$page."</a></li>";
		} else {
			$p.="<li><a href='{$url}?page={$i}&&id={$id}&&{$where}'>{$i}</a><li>";
		}
	}
	return $prev.$p.$next;
}