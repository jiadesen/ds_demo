<?php
//包含随机生成字符方法函数文件
require_once 'string.func.php';
//通过GD库做验证码
function verifyImage($type = 1, $length = 4, $pixel = 200, $line = 3, $sess_name = "verify") //最后封装
{
//  session_start(); //注：使用session(会话控制)，必须将session_start()方法放在程序最顶部，然后在该脚本里就可以使用SESSION来保存数据了
//创建画布
    $width = 80;
    $height = 28;
    $image = imagecreatetruecolor($width, $height);
//设置背景颜色
    $bgcolor = imagecolorallocate($image, 200, 200, 200);

//填充画布
    imagefill($image, 0, 0, $bgcolor);
//调用自定义方法生成验证码
//  $type = 1; //作为参数
//  $length = 4; //作为参数
    $chars = buildRandomString($type, $length);
//定义验证码名字
//  $sess_name="verify"; //封装后放到传参位置，作为一个可选参数
//将随机生成的验证码保存到 $_SESSION 的 authcode 变量中
    $_SESSION[$sess_name] = $chars;
//定义字体文件库
    $fontfiles = array("SIMYOU.TTF", "STCAIYUN.TTF", "STHUPO.TTF", "STZHONGS.TTF");
    for ($i = 0; $i < $length; $i++) {
        $size = mt_rand(14, 18); //14-18随机大小
        $angle = mt_rand(-15, 15); //随机角度
        $x = 5 + $i * $size; //x坐标
        $y = mt_rand(20, 26); //y坐标
        //随机从字体文件库中随机取出一种字体
        $fontfile = "../fonts/" . $fontfiles[mt_rand(0, count($fontfiles) - 1)];
        //设置字体颜色(随机)
        $fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $fontcolor, $fontfile, $text);
    }

//  $pixel = 200;
    if ($pixel) { //封装思想，验证码模块可以自定义是否需要杂色点，默认需要
//设置背景干扰元素-点(默认200个杂色点)
        for ($i = 0; $i < $pixel; $i++) {
            $pointcolor = imagecolorallocate($image, rand(50, 200), rand(50, 200), rand(50, 200));
            imagesetpixel($image, rand(1, 79), rand(1, 27), $pointcolor); //imagesetpixel方法将点画到画布上
        }
    }

//  $line = 3;
    if ($line) { //封装思想，验证码模块可以自定义是否需要干扰线，默认需要3条，$line=0时没有参考线
//设置背景干扰元素-线(3条干扰线即可)
        for ($i = 0; $i < $line; $i++) {
            $linecolor = imagecolorallocate($image, rand(80, 220), rand(80, 220), rand(80, 220));
            imageline($image, rand(1, 79), rand(1, 27), rand(1, 79), rand(1, 27), $linecolor); //imageline方法将线绘制到画布上
        }
    }

//告诉浏览器数据类型
    header("Content-Type:image/gif");
    imagegif($image);
//销毁
    imagedestroy($image);
}

//调用测试
//verifyImage();

/**
 * 生成缩略图
 * @param string $filename
 * @param string $destination
 * @param int $dst_w
 * @param int $dst_h
 * @param bool $isReservedSource
 * @param number $scale
 * @return string
 */
function thumb($filename, $destination = null, $dst_w = null, $dst_h = null, $isReservedSource = true, $scale = 0.5)
{
    list($src_w, $src_h, $imagetype) = getimagesize($filename);
    if (is_null($dst_w) || is_null($dst_h)) {
        $dst_w = ceil($src_w * $scale);
        $dst_h = ceil($src_h * $scale);
    }
    $mime = image_type_to_mime_type($imagetype);
    $createFun = str_replace("/", "createfrom", $mime);
    $outFun = str_replace("/", null, $mime);
    $src_image = $createFun($filename);
    $dst_image = imagecreatetruecolor($dst_w, $dst_h);
    imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    if ($destination && !file_exists(dirname($destination))) {
        mkdir(dirname($destination), 0777, true);
    }
    $dstFilename = $destination == null ? getUniName() . "." . getExt($filename) : $destination;
    $outFun($dst_image, $dstFilename);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if (!$isReservedSource) {
        unlink($filename);
    }
    return $dstFilename;
}



















