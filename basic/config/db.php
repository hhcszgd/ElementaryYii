<?php

return [
    'class' => 'yii\db\Connection',
//    'dsn' => 'mysql:host=localhost;dbname=yii',//数据源名称
    'dsn' => 'mysql:host=localhost;dbname=imooc_test',//数据源名称
    'username' => 'root',//数据库用户名
    'password' => 'Swift_2018',//数据库密码
    'charset' => 'utf8',//字符集
    'tablePrefix' => "imooc_",//表前缀
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
