<?php


 function checkSignature()
{
    $signature = _GET["signature"];
    $timestamp = _GET["timestamp"];
    $nonce  = _GET["nonce"];
    $token = "hhcszgd";
    $tmpArr = array($token , $timestamp, $nonce);
    sort($tmpArr, SORT_STRING);
    $tmpStr = implode( $tmpArr );
    $tmpStr = sha1( $tmpStr );

    if( $signature == $tmpStr){
        return _GET["echostr"];;
    }else{
        return "";
    }
}
checkSignature();

