<?php
$filename = "des_big.jpg";
list($src_w,$src_h,$imagetype) = getimagesize($filename);
$mime = image_type_to_mime_type($imagetype);
$createFun = str_replace("/","createfrom", $mime);
$outFun = str_replace("/", null, $mime);
$src_image = $createFun($filename);//从 PNG 文件或 URL 载入一图像
$dst_50_image = imagecreatetruecolor(50, 50);//返回一个图像标识符，代表了一幅大小为 x_size 和 y_size 的黑色图像。
$dst_220_image = imagecreatetruecolor(220, 220);
$dst_350_image = imagecreatetruecolor(350, 350);
$dst_800_image = imagecreatetruecolor(800, 800);
imagecopyresampled($dst_50_image, $src_image, 0,0,0,0, 50, 50, $src_w, $src_h);//$dst_image：新建的图片 $src_image：需要载入的图片
imagecopyresampled($dst_220_image, $src_image, 0,0,0,0, 220, 220, $src_w, $src_h);
imagecopyresampled($dst_350_image, $src_image, 0,0,0,0, 350, 350, $src_w, $src_h);
imagecopyresampled($dst_800_image, $src_image, 0,0,0,0, 800, 800, $src_w, $src_h);
$outFun($dst_50_image,"uploads/image_50/".$filename);// 从 image 图像以 filename 为文件名创建一个 JPEG 图像
$outFun($dst_220_image,"uploads/image_220/".$filename);
$outFun($dst_350_image,"uploads/image_350/".$filename);
$outFun($dst_800_image,"uploads/image_800/".$filename);
imagedestroy($src_image);
imagedestroy($dst_220_image);
imagedestroy($dst_350_image);
imagedestroy($dst_50_image);
imagedestroy($dst_800_image);


