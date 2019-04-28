<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/4/28
 * Time: 14:14
 */

/*
1 : Gii
Gii 号称脚手架工具 , 可以自动生成模块代码,需要在main_local.php中开启,如下
if (!YII_ENV_TEST) {
// configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}


如果Gii开启成功 , 访问这个链接会显示一个Gii的使用页面
http://ddblog.com/advanced/backend/web/index.php?r=gii

可以用来创建数据库对应的模型类 , 创建模型类对应的控制器,视图,查询类等等
*/