<?php
//封装一个验证账户登录的函数
function checkAdmin($sql)
{
    return fetchOne($sql); //该方法定义在文件 mysql.func.php 中(基本的数据库操作方法文件)
}

//封装一个检查是否登录的函数
function checkLogined()
{
    //如果当前会话的$_SESSION['adminId']且cookie中没有相应值，则判定没有登录
    if (@$_SESSION['adminId'] == "" && @$_COOKIE['adminId'] == "") {
        alertMes("没有登录，请先登录！", "login.php");
    }
}

//封装一个注销登录的函数
function logout()
{
    $_SESSION = array(); //清空SESSION
    if (isset($_COOKIE[session_name()])) { //清空cookie中的自动登录信息
        setcookie(session_name(), "", time() - 1);
    }
    if (isset($_COOKIE['adminId'])) {
        setcookie("adminId", "", time() - 1);
    }
    if (isset($_COOKIE['adminName'])) {
        setcookie("adminName", "", time() - 1);
    }
    session_destroy(); //销毁当前会话
    header("location:login.php"); //跳转到登录页面
}

//添加管理员
function addAdmin()
{
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    //为管理员添加必要权限
    if (@$_SESSION['supAdmin'] != '是') {
        $mes = "您无权添加管理员账号!<br/><a href='listAdmin.php'>查看管理员列表</a>";
    } else {
        if (insert("shop_admin", $arr)) {
            $mes = "添加成功！<br/><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
        } else {
            $mes = "添加失败！<br/><a href='addAdmin.php'>重新添加</a>";
        }
    }
    return $mes;
}

//查询管理员
function getAllAdmin()
{

    $sql = "select id,username,email from shop_admin";
    $rows = fetchAll($sql);
    return $rows;
}

//分页
function getAdminByPage($page, $pageSize = 2)
{
    $sql = "select * from shop_admin";
    global $totalRows; //总条数
    $totalRows = getResultNum($sql);
    global $totalPage; //总页数
    $totalPage = ceil($totalRows / $pageSize);
    if ($page < 1 || $page == null || !is_numeric($page)) {
        $page = 1;
    }
    if ($page >= $totalPage) $page = $totalPage;
    $offset = ($page - 1) * $pageSize;
    $sql = "select id,username,email,supAdmin from shop_admin limit {$offset},{$pageSize}";
    $rows = fetchAll($sql);
    return $rows;
}

//编辑管理员
function editAdmin($id)
{
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if (@$_SESSION['supAdmin'] != '是') {
        $mes = "您无权对管理员账号进行编辑操作!<br/><a href='listAdmin.php'>查看管理员列表</a>";
    } else {
        if (update("shop_admin", $arr, $id)) {
            $mes = "编辑成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
        } else {
            $mes = "编辑失败!<br/><a href='listAdmin.php'>重新编辑</a>";
        }
    }
    return $mes;
}

//删除管理员的操作，增加判断是否有对管理员账户进行管理的权限
function delAdmin($id)
{
    //为管理员添加必要权限
    if (@$_SESSION['supAdmin'] != '是') {
        $mes = "您无权对管理员账号进行删除操作!<br/><a href='listAdmin.php'>查看管理员列表</a>";
    } else {
        if (delete("shop_admin", "id={$id}")) {
            $mes = "删除成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
        } else {
            $mes = "删除失败!<br/><a href='listAdmin.php'>重新删除</a>";
        }
    }
    return $mes;
}





















