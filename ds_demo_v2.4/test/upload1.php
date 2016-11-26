<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="doAction2.php" method="post" enctype="multipart/form-data">
    <!--  设置隐藏域在客户端限制上传文件的大小(2M),但不推荐使用，可以人为更改，不安全-->
    <!--  <input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>-->
    请选择上传文件：
    <input type="file" name="myFile1"/><br/>
    <input type="file" name="myFile2"/><br/>
    <input type="file" name="myFile3"/><br/>
    <input type="submit" value="上传"/>
</form>
</body>
</html>