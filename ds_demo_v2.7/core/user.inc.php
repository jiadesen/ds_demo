<?php
//分页
function getUserByPage($page, $pageSize = 2)
{
    $sql = "SELECT * FROM shop_user";
    global $totalRows;
    $totalRows = getResultNum($sql);
    global $totalPage;
    $totalPage = ceil($totalRows / $pageSize);
    if ($page < 1 || $page == null || !is_numeric($page)) {
        $page = 1;
    }
    if ($page >= $totalPage) $page = $totalPage;
    $offset = ($page - 1) * $pageSize;
    $sql = "SELECT id,username,email FROM shop_user limit {$offset},{$pageSize}";
    $rows = fetchAll($sql);
    return $rows;
}

//添加用户
function addUser()
{
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
//为管理员添加必要权限
    if (@$_SESSION['supAdmin'] != '是') {
        $mes = "您无权添加用户账号!<br/><a href='listUser.php'>查看用户列表</a>";
    } else {
        if (insert("shop_user", $arr)) {
            $mes = "添加成功！<br/><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>查看用户列表</a>";
        } else {
            $mes = "添加失败！<br/><a href='addUser.php'>重新添加</a>";
        }
    }
    return $mes;
}

//编辑用户账户
function editUser($id)
{
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if (@$_SESSION['supAdmin'] != '是') {
        $mes = "您无权对用户账户进行编辑操作!<br/><a href='listUser.php'>查看用户列表</a>";
    } else {
        if (update("shop_user", $arr, $id)) {
            $mes = "编辑成功!<br/><a href='listUser.php'>查看管理员列表</a>";
        } else {
            $mes = "编辑失败!<br/><a href='listUser.php'>重新编辑</a>";
        }
    }
    return $mes;
}

//删除用户账户
function delUser($id)
{
//为管理员添加必要权限
    if (@$_SESSION['supAdmin'] != '是') {
        $mes = "您无权对用户账号进行删除操作!<br/><a href='listUser.php'>查看用户列表</a>";
    } else {
        if (delete("shop_user", "id={$id}")) {
            $mes = "删除成功!<br/><a href='listUser.php'>查看管理员列表</a>";
        } else {
            $mes = "删除失败!<br/><a href='listUser.php'>重新删除</a>";
        }
    }
    return $mes;
}