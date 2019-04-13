<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/4/11
 * Time: 16:11
 */
//echo "sss";
$img = imagecreatefromjpeg("../Medias/8.jpg");
//$img = imagecreatefromjpeg("file:///Users/wy/MySource/project/githubProject/PHP/ddyiiyii/basic/web/Medias/8.jpg");

//文字水印
imagestring($img,5,10, 10 ,"hello world" , imagecolorallocate($img , 0 , 255 , 255 ));
Header("Content-type: image/png");
imagepng($img);