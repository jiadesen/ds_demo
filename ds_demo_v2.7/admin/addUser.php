<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h3>添加用户</h3>
<form action="doAdminAction.php?act=addUser" method="post">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">用户名：</td>
            <td><input type="text" name="username" placeholder="请输入用户名"/></td>
        </tr>
        <tr>
            <td align="right">密码：</td>
            <td><input type="password" name="password" placeholder="请输入密码"/></td>
        </tr>
        <tr>
            <td align="right">邮箱：</td>
            <td><input type="text" name="email" placeholder="请输入邮箱"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="添加用户"/></td>
        </tr>
    </table>
</form>
</body>
</html>