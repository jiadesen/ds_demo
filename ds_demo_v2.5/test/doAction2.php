<?php
//上传多个单文件
header('Content-Type: text/html;charset=UTF-8');
//print_r($_FILES); //二维数组
foreach ($_FILES as $val) {
    $mes = uploadFile($val);
    echo $mes;
};