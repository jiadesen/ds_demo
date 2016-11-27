<?php
$username = $_REQUEST['username'];

$patten = "/^[A-Za-z0-9]+$/"; //添加正则，用户名仅允许使用大小写字母和数字
//echo preg_match($patten,$username); //符合正则返回1，不符合返回0
if (!preg_match($patten, $username)) {
    echo "noreg";
} else {
    include('../configs/configs.php');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
    $sql = "SET NAMES UTF8";
    mysqli_query($conn, $sql);
    $sql = "SELECT * FROM shop_user WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

//    if (!$result) { //判断错误使用
//        echo $result;
//        printf("Error: %s\n", mysqli_error($conn));
//        exit();
//    }

    $row = mysqli_fetch_all($result);
    if ($row) {
        echo "cunzai";
    } else {
        echo "bucunzai";
    }
}

