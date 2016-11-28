<?php
//上传一个单文件
header('Content-Type: text/html;charset=UTF-8');
require_once '../lib/string.func.php';
require_once 'upload.func.php';
$fileInfo = $_FILES['myFile']; //上传文件信息
$info = uploadFile($fileInfo);
echo $info;