<!--<h1>hello</h1>-->
<?php
use yii\helpers\html;
use yii\helpers\HtmlPurifier;
?>
<!--<h1>值传递 : --><?//=   $view_hello_str ;?><!--</h1>-->
<!--<h1>值传递 : --><?//=   $arr[0] ;?><!--</h1>-->

<!--//会执行字符串里的js代码-->
<!--<h1>值传递 : --><?//=   $strWithJS ;?><!--</h1>-->

<!--//不会执行字符串里的js代码,直接被输出-->
<!--<h1>值传递 : --><?//=   html::encode($strWithJS);?><!--</h1>-->

<!--//忽略字符串里的js代码,显示非js代码-->
<!--<h1>值传递 : --><?//=   HtmlPurifier::process($strWithJS) ;?><!--</h1>-->
al;kjsd;lfkja;lk