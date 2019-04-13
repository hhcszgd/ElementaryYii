<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/4/11
 * Time: 15:03
 */
/*
feof() 函数检测是否已到达文件末尾 (eof)。
如果文件指针到了 EOF 或者出错时则返回 TRUE，否则返回一个错误（包括 socket 超时），其它情况则返回 FALSE。
语法
feof(file)
 * */
$f = fopen("./HandleJson.php" , "r");//以写的方式打开,并返回文件句柄

///读取内容的方式1
//fgets($f);//只读取第一行,没读一次,文件指针往下移动一行
//$contentInStringFormate = fgets($f);//只读取第一行,没读一次,文件指针往下移动一行
//echo $contentInStringFormate;
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");
//echo (fgets($f) . "<br/>");

//while (!feof($f)){
//    echo (fgets($f) . "<br/>");
//}
///读取内容的方式1
//file_get_contents("HandleJson.php");  直接获取文件全部内容
if (file_exists("HandleJson.php")){
    echo "文件存在";
    $result = file_get_contents("HandleJson.php" , null  , null , 1);
    echo $result;
}else{
    echo "文件bu 存在";
}


fwrite($file , "something to be write");//追加一句内容
fclose($f);//关闭文件句柄
echo $file;
