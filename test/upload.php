<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<form action="doAction1.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SZIE" value="1048576"/>
	请选择上传文件：<input type="file"  name="myFile"  id="myFile" accept="image/jpeg,image/gif,image/png"/><br/>
	<input type="submit" value="上传"/>
</form>
</body>
</html>
