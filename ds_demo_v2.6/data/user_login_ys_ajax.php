<?php
header('Content-Type:application/json;charset=UTF-8');
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);
$patten = '/^[A-Za-z0-9]+$/'; //添加正则，输入的用户名仅允许使用大小写字母和数字
$output = []; //要返回的json字符串
if (!preg_match($patten, $username)) {
    $output['msg'] = 'no_reg';
    echo json_encode($output);
} else {
    include('../configs/configs.php');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    $sql = "SET NAMES UTF8";
    mysqli_query($conn, $sql);
    $sql = "SELECT id FROM shop_user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result === false) { //sql语句执行失败
        echo $sql;
    } else { //sql语句执行成功
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $output['msg'] = 'ok';
        } else {
            $output['msg'] = 'err';
            echo $row;
        }
    }
    echo json_encode($output);
}
