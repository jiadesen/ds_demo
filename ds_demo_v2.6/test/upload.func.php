<?php
header('Content-Type: text/html;charset=UTF-8');
require_once '../lib/string.func.php';
//$_FILES
//获得上传文件的信息
//$filename = $_FILES['myFile']['name'];
//$type = $_FILES['myFile']['type'];
//$tmp_name = $_FILES['myFile']['tmp_name'];
//$error = $_FILES['myFile']['error'];
//$size = $_FILES['myFile']['size'];
//封装一个可自定义配置上传文件信息的函数
function uploadFile($fileInfo, $path = "uploads", $allowExt = array("gif", "jpeg", "jpg", "png", "wbmp"), $maxSize = 2097152, $imgFlag = true)
{
//  $allowExt = array("gif", "jpeg", "jpg", "png", "wbmp"); //规定允许上传的文件类型，安全方面考虑
//  $maxSize = 2097152; //单位字节，规定上传文件的大小2*1024*1024 b(1kb=1024b字节)
//  $imgFlag = true; //上传文件安全考虑
//判断下错误信息
    if ($fileInfo['error'] == UPLOAD_ERR_OK) {
        $ext = getExt($fileInfo['name']); //取出文件扩展名用于验证
        //限制上传文件类型
        if (!in_array($ext, $allowExt)) {
            exit ("非法文件类型");
        }
        if ($fileInfo['size'] > $maxSize) {
            exit ("文件过大");
        }
        if ($imgFlag) {
            //如何验证图片是否是一个真正的图片类型
            //getimagesize($filename):验证文件是否真正是图片类型
            $info = getimagesize($fileInfo['tmp_name']); //如果图片不安全，返回false
            //var_dump($info);exit;
            if (!$info) {
                exit("不是真正的图片类型"); //退出阻止上传
            }
        }
        //需要判断下文件是否是通过HTTP POST方式上传上来的
        //is_uploaded_file($tmp_name):
        $filename = getUniName() . "." . $ext;
//    $path = "uploads"; //需要移动到的文件夹
        if (!file_exists($path)) { //如果文件夹不存在，则创建
            mkdir($path, 0777, true);
        }
        $destination = $path . "/" . $filename;
        if (is_uploaded_file($fileInfo['tmp_name'])) {
            if (move_uploaded_file($fileInfo['tmp_name'], $destination)) { //移动文件
                $mes = "文件上传成功";
            } else {
                $mes = "文件移动失败";
            }
        } else {
            $mes = "文件不是通过HTTP POST方式上传上来的";
        }
    } else {
        switch ($fileInfo['error']) {
            case 1:
                $mes = "超过了配置文件上传文件的大小";//UPLOAD_ERR_INI_SIZE
                break;
            case 2:
                $mes = "超过了表单设置上传文件的大小";      //UPLOAD_ERR_FORM_SIZE
                break;
            case 3:
                $mes = "文件部分被上传";//UPLOAD_ERR_PARTIAL
                break;
            case 4:
                $mes = "没有文件被上传";//UPLOAD_ERR_NO_FILE
                break;
            case 6:
                $mes = "没有找到临时目录";//UPLOAD_ERR_NO_TMP_DIR
                break;
            case 7:
                $mes = "文件不可写";//UPLOAD_ERR_CANT_WRITE;
                break;
            case 8:
                $mes = "由于PHP的扩展程序中断了文件上传";//UPLOAD_ERR_EXTENSION
                break;
        }
    }
    return $mes;
}
//echo $mes;
//服务器端进行的配置
//1》file_uploads = On,支持通过HTTP POST方式上传文件
//2》;upload_tmp_dir =临时文件保存目录
//3》upload_max_filesize = 2M默认值是2M，上传的最大大小2M
//4》post_max_size = 8M，表单以POST方式发送数据的最大值，默认8M
//客户端进行配置
//<input type="hidden" name="MAX_FILE_SIZE" value="1024"  /> 隐藏域配置
//<input type="file" name="myFile" accept="文件的MIME类型,..."/>