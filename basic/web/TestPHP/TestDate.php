<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/4/10
 * Time: 16:54
 */
//按F1 有提示
$currentTime = time();//获取当前日期
echo $currentTime . "<br/>" ;
date_default_timezone_set("Asia/Shanghai");//设置时区
echo date("Y-m-d H:i:s" , $currentTime)  . "<br/>" ;
echo date("Y-m-d H:i:s" , $currentTime + 222222);