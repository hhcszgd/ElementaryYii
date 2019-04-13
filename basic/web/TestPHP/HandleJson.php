<?php

/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/4/11
 * Time: 14:46
 */
$arr = array(1,2,4,8,0 ,"hello" , "world" , array("name" => "Jack" , "age" => 23));
print_r($arr ) ;
echo "<br/>";
$json_arr = json_encode($arr);
echo $json_arr;
echo "<br/>";
$newArr = json_decode($json_arr);
print_r( $newArr);
echo "<br/>";
print_r($newArr[7]);