<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/4/4
 * Time: 14:36
 */

private function checkSignature()
{
    $signature = _GET["signature"];
    $timestamp = _GET["timestamp"];
    $nonce  = _GET["nonce"];

    $tmpArr = array($timestamp, $nonce);
    sort($tmpArr, SORT_STRING);
    $tmpStr = implode( $tmpArr );
    $tmpStr = sha1( $tmpStr );

    if( $signature ){
        return true;
    }else{
        return false;
    }
}
checkSignature();

?>