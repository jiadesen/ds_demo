<?php
//说明：sign_in.js 中 '功能点3：原生AJAX实现异步的提交注册信息' 信息处理文件
//header('Content-Type: application/json;charset=UTF-8');
header('Content-Type: text/plain;charset=UTF-8');
//接收并处理客户端提交的数据
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']); //加密
$email = $_REQUEST['email'];

include('../configs/configs.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);

//提交SQL
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);
$sql = "INSERT INTO shop_user VALUES(NULL,'$username','$password','$email')";
$result = mysqli_query($conn, $sql);

//查看执行结果，向客户端进行输出
//$row = mysqli_fetch_assoc($result);

if ($result) {
    echo 'succ';
} else {
    echo 'err';
}
//把数据编码为JSON字符串
//echo json_encode($output);