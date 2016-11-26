<?php
$username = $_REQUEST['username'];

include('../configs/configs.php');
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME);
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);
$sql = "SELECT * FROM shop_user WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row) {
    echo "cunzai";
} else {
    echo "bucunzai";
}