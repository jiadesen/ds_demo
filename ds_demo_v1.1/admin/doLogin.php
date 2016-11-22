<?php
require_once '../include.php';
$username = $_POST['username'];
$password = md5($_POST['password']); //加密
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
$autoFlag = $_POST['autoFlag']; //自动登录
if ($verify == $verify1) {
  $sql = "SELECT * FROM shop_admin WHERE username='{$username}' AND password='{$password}'";
  $res = checkAdmin($sql); //调用core文件夹下的admin.inc.php中定义好的checkAdmin()方法
//  print_r($res); //客户端输出测试
  if ($res) { //如果验证通过
    //如果勾选了一周内自动登录,存入两条cookie
    if ($autoFlag) {
      setcookie("adminId", $res['id'], time() + 7 * 24 * 3600); //存入用户的id，值是$res['id'],有效时间一周
      setcookie("adminName", $res['username'], time() + 7 * 24 * 3600);
    }
    //将$res中的username保存在 $_SESSION中的adminName中
    $_SESSION['adminName'] = $res['username'];
    $_SESSION['adminId'] = $res['id']; //用于检查是否登录
    //验证通过跳转
//    header("location:index.php");
    alertMes("登录成功", "index.php");
  } else {
    alertMes("登录失败，请重新登录", "login.php"); //此方法定义在common.func.php(公共函数库)
  }
} else {
  alertMes("验证码错误", "login.php");
}