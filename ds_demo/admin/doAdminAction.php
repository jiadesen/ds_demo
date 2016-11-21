<?php
//这个文件用于接收用户操作，根据不同的操作完成对应的功能
require_once '../include.php';
$act = $_REQUEST['act'];
@$id = $_REQUEST['id'];
$mes = "";
if ($act == "logout") {
  logout();
} elseif ($act == "addAdmin") {
  $mes = addAdmin();
} elseif ($act == "delAdmin") {
  $mes = delAdmin($id);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title></title>
</head>
<body>
<?php
if ($mes) {
  echo $mes;
}
?>
</body>
</html>




