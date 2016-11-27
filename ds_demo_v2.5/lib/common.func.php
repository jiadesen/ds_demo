<?php
//此文件定义一些公共函数
//定义登录成功或失败时的跳转
function alertMes($mes, $url) //传入弹出信息和跳转的url
{
    echo "<script>alert('$mes');</script>"; //弹出信息
    echo "<script>window.location='{$url}';</script>"; //并跳转
}