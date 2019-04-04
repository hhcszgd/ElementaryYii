<?php

function checkoutToken(){
    header('Content-type: text/plain');
    $signature=$_GET["signature"];
    $timestamp=$_GET["timestamp"];
    $nonce=$_GET["nonce"];
    $token="hhcszgd";
    $echostr=$_GET['echostr'];
    $tmpArr=array($token , $timestamp, $nonce);
    sort($tmpArr , 2);
    $tmpStr=implode( $tmpArr );
    $tmpStr1=sha1( $tmpStr );
//print_r(" echostr:{$echostr} "  );
//print_r(" signature:{$signature} "  );
//print_r(" timestamp:{$timestamp} "  );
//print_r( " nonce : {$nonce}"  );
//print_r(" token: {$token}"  );
//print_r(" tmpArr : {$tmpArr}"  );
//print_r(" tmpStr : {$tmpStr}" );
//print_r(" tmpStr1 : {$tmpStr1}" );
//echo "xxxxxx";
    if( $signature==$tmpStr1){
//    return $echostr;
        echo $echostr;
    }else{
        return "ss";
//    echo "sssssss";
//    return "failure";
    }
}
checkoutToken();
?>