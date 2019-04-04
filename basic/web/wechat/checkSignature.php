<?php



    $signature=$_GET["signature"];
    $timestamp=$_GET["timestamp"];
    $nonce=$_GET["nonce"];
    $token="hhcszgd";
    $echostr=$_GET["echostr"];
    $tmpArr=array($token , $timestamp, $nonce);
    sort($tmpArr , 2);
    $tmpStr=implode( $tmpArr );
    $tmpStr1=sha1( $tmpStr );

    print_r(" signature:{$signature} "  );
    print_r(" timestamp:{$timestamp} "  );
    print_r( " nonce : {$nonce}"  );
    print_r(" token: {$token}"  );
    print_r(" tmpArr : {$tmpArr}"  );
    print_r(" tmpStr : {$tmpStr}" );
    print_r(" tmpStr1 : {$tmpStr1}" );
    echo "xxxxxx";
    if( $signature == $tmpStr1){
        return $echostr;
    }else{
        return "failure";
    }


//http://101.200.45.131/wechat/checkSignature.php?signature=4fb62c5f431613dd83f5da66c849ca9e6b90aece&echostr=7019144854469720927&timestamp=1554362711&nonce=522026408