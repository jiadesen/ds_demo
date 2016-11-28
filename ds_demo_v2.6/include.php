<?php
header('Content-Type:text/html;charset=utf-8');
date_default_timezone_set("PRC"); //设置默认中国时区
session_start();
//设置常量
define("ROOT", dirname(__FILE__));
//设置根路径
set_include_path("." . PATH_SEPARATOR . ROOT . "/lib"
    . PATH_SEPARATOR . ROOT . "/core"
    . PATH_SEPARATOR . ROOT . '/configs'
    . PATH_SEPARATOR . get_include_path());
require_once 'mysql.func.php';
require_once 'image.func.php';
require_once 'common.func.php';
require_once 'string.func.php';
require_once 'page.func.php';
require_once 'common.func.php';
require_once 'configs.php';
require_once 'admin.inc.php';
require_once 'cate.inc.php';
require_once 'pro.inc.php';
require_once 'album.inc.php';
require_once 'upload.func.php';
require_once 'user.inc.php';
connect();
