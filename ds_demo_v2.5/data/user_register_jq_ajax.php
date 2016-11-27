<?php
//说明：sign_in.js 中 '功能点3：jquery实现异步的提交注册信息' 信息处理文件
//接收客户端提交的注册信息，存入数据库，返回{"msg":"succ","uid":"x"}或{"msg":"err","sql":"INSERT..."}
header('Content-Type: application/json;charset=UTF-8');
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

//创建要输出给客户端的数据
$output = [];
if ($result) {
    $output['msg'] = 'succ';
    $output['uid'] = mysqli_insert_id($conn);
} else {
    $output['msg'] = 'err';
    $output['sql'] = $sql;
}
//把数据编码为JSON字符串
echo json_encode($output);