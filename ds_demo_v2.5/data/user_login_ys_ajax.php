<?php
header('Content-Type:application/json;charset=UTF-8');
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);
include('../configs/configs.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);
$sql = "SELECT id FROM shop_user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result);
$output = [];
if ($row) {
    $output['msg'] = 'ok';
} else {
    $output['msg'] = 'err';
}
echo json_encode($output);