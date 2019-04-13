<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/4/11
 * Time: 15:53
 */

$img = imagecreate(800 , 600);//创建一张图片,并指定宽高
imagecolorallocate($img , 255 , 0 , 255);//给图片指定背景色,首次生效
//在图片上绘制一个椭圆形,并给椭圆形设置颜色
imageellipse($img,400 , 300 ,400 , 300 , imagecolorallocate($img , 0 , 255 , 255 ));
header("Content-type: image/png");////设置mime type , 即以图片形式展示
imagepng($img);//输出图片到屏幕