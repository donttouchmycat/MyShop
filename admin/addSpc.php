<?php
require_once '../include.php';
checkLogined();
$id=$_REQUEST['id'];
$proInfo=getProById($id);
@$spc=getAllSpc($id);
@$sel1=getOneSel($id);
@$sel2=getTowSel($id);

//print_r($proInfo);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="./js/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="./js/jquery-1.6.4.js"></script>
</head>
<body>
<h3>修改商品</h3>
<form action="doAdminAction.php?act=wstore&id=<?php echo $id;?>" method="post" >
	<table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr >
			<td>
				规格（可修改）
			</td>
			<td>
				选项（可修改）
			</td>
			<td>
				价格（不能修改）
			</td>
		</tr>
		<tr>
			<td><input type="text" name="sp[]" value="<?php echo $spc?$spc['0']['attr_name']:'颜色';?>"/></td>
			<td>
				<input type="text" name="sp[]" value="<?php echo $spc?$spc['1']['attr_name']:'规格';?>"/>
			</td>
			<td>
				<input type="text" value="价格"/>
			</td>
		</tr>
		<tr>
			<td><input type="text" name="spc[]" value="<?php echo $sel1?$sel1['0']['attr_value']:'黑色';?>"/></td>
			<?php if ($sel1){
				foreach ($sel2 as $se2){?>
			<tr>
				<td>
					<input type="text" name="selec[]" value="<?php echo $se2['attr_value']?>"/>
				</td>
				<td>
					<input type="text" name="sprice[]" value="<?php echo getPrice($sel1['0']['symbol'],$se2['symbol'],$id) ?>"/>
				</td>
				<td>
					<input type="button" value="删除" onclick="del(event)"/>
				</td>
			</tr>
			<?php }}else{?>
			<tr>
				<td>
					<input type="text" name="selec[]" value="16GB"/>
				</td>
				<td>
					<input type="text" name="sprice[]" value="2000"/>
				</td>
				<td>
					<input type="button" value="删除" onclick="del(event)"/>
				</td>
			</tr>
			<tr id="form1">
				<td colspan="4"><input type="button" value="增加规格" onclick="add1()"/></td>
			</tr>
		</tr>
		<?php }?>
		<tr>
			<td><input type="text" name="spc[]" value="<?php echo $sel1?$sel1['1']['attr_value']:'白色';?>"/></td>
			<?php if ($sel1){foreach ($sel2 as $se2){?>
			<tr>
				<td>
					<input type="text" value="<?php echo $se2['attr_value']?>"/>
				</td>
				<td>
					<input type="text" name="sprice[]" value="<?php echo getPrice($sel1['1']['symbol'],$se2['symbol'],$id)?>"/>
				</td>

				<td>
					<input type="button" value="删除" onclick="del(event)"/>
				</td>
			</tr>
			<?php }}else{?>
			<tr>
				<td>
					<input type="text" value="16GB"/>
				</td>
				<td>
					<input type="text" name="sprice[]" value="1200"/>
				</td>

				<td>
					<input type="button" value="删除" onclick="del(event)"/>
				</td>
			</tr>
			<?php }?>
			<tr id="form2">
				<td colspan="4"><input type="button" value="增加规格" onclick="add2()"/></td>
			</tr>
		</tr>

		<tr>
			<td colspan="4"><input type="submit"  value="编辑商品"/></td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	function add1(event){
		var str='<tr><td><input type="text" name="selec[]"/></td><td><input type="text" name="sprice[]"/></td><td><input type="button" value="删除" onclick="del(event)"/></td></tr>';

		$('#form1').before(str);
	}
	function add2(event){
		var str='<tr><td><input type="text"/></td><td><input type="text" name="sprice[]"/></td><td><input type="button" value="删除" onclick="del(event)"/></td></tr>';

		$('#form2').before(str);
	}
	function del(event){
		var node = event.target;
		var parent =node.parentNode.parentNode;
		parent.parentNode.removeChild(parent);
		}

</script>
</body>
</html>