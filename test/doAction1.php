<?php
require_once '../lib/string.func.php';
require_once 'doAction2.php';
header("content-type:text/html;charset=utf-8");
$fileInfo=$_FILES['myFile'];
$info=uploadFile($fileInfo);
echo $info;