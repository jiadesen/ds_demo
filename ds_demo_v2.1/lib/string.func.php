<?php
//封装生成随机数字和字母的方法，传入字符种类和长度，默认1，4
function buildRandomString($type = 1, $length = 4)
{
  if ($type == 1) { // 1纯数字
    $chars = join("", range(0, 9));
  } elseif ($type == 2) { // 2大写字母和小写字母
    $chars = join("", array_merge(range("a", "z"), range("A", "Z")));
  } elseif ($type == 3) { // 3数字，大写字母和小写字母
    $chars = join("", array_merge(range("a", "z"), range("A", "Z"), range(0, 9)));
  }
  if ($length > strlen($chars)) {
    exit("字符串长度不够");
  }
  $chars = str_shuffle($chars); //打乱字符串
  return substr($chars, 0, $length); //截取指定位数
}












