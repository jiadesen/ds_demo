<?php
header('Content-Type: text/html;charset=UTF-8');
echo md5("jiadesen");
$sql = "insert shop_admin(username,password,email) values('jiadesen','10b065d12b81e50c0b402c0c5847e301','jiadesen1993@163.com')";
echo $sql;
Phpinfo();

