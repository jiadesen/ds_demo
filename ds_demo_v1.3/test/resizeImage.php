<?php
//(测试)给定一张测试图片，创建0.5缩放缩略图
$filename = "des_big.jpg"; //传入需要形成缩略图的资源
$src_image = imagecreatefromjpeg($filename); //创建jpeg画布资源
list($src_w, $src_h) = getimagesize($filename); //得到原图片宽和高
$scale = 0.5; //缩放比例
$dst_w = ceil($src_w * $scale); //宽
$dst_h = ceil($src_h * $scale); //高
$dst_image = imagecreatetruecolor($dst_w, $dst_h); //创建新画布
//画布重采样
imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
header("content-type:image/jpeg");
//imagejpeg($dst_image); //显示生成的图片
imagejpeg($dst_image, "uploads/" . $filename); //保存图片
imagedestroy($src_image); //销毁
imagedestroy($dst_image); //销毁
