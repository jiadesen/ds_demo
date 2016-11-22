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
} elseif ($act == "editAdmin") {
  $where = "id={$id}";
  $mes = editAdmin($where);
} elseif ($act == "delAdmin") {
  $mes = delAdmin($id);
} elseif ($act == "addCate") {
  $mes = addCate();
} elseif ($act == "editCate") {
  $where = "id={$id}";
  $mes = editCate($where);
} elseif ($act == "delCate") {
  $mes = delCate($id);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
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




