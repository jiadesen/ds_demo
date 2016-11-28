<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div>
    <h3>系统信息</h3>
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <th>操作系统</th>
            <td><?php echo PHP_OS; ?></td>
        </tr>
        <tr>
            <th>Apache版本</th>
            <td><?php echo apache_get_version(); ?></td>
        </tr>
        <tr>
            <th>PHP版本</th>
            <td><?php echo PHP_VERSION; ?></td>
        </tr>
        <tr>
            <th>运行方式</th>
            <td><?php echo PHP_SAPI; ?></td>
        </tr>
    </table>
</div>
</body>
</html>