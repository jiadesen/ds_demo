<?php
header('Content-Type:text/plain;charset=UTF-8');
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);
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
