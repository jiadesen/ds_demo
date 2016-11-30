<?php
header('Content-Type:text/plain;charset=UTF-8');
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);
$patten = '/^[A-Za-z0-9]+$/';//添加正则，输入的用户名仅允许使用大小写字母和数字
if (!preg_match($patten, $username)) {
    echo 'no_reg';
} else {
    include('../configs/configs.php');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    $sql = "SET NAMES UTF8";
    mysqli_query($conn, $sql);
    $sql = "SELECT id FROM shop_user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql); // T/F
    if ($result) {
        $row = mysqli_fetch_all($result);
        if ($row) {
            echo 'ok';
        } else {
            echo 'err';
        }
    } else {
        echo $sql;//测试使用
    }
}
