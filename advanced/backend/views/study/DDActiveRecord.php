<?php
namespace backend\controllers;

use Yii;
use common\models\Post;
//use common\models\PostSearch;
//use yii\web\Controller;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;


/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/4/28
 * Time: 14:15
 */


/*

一 :  DAO (Database Access Objects)
是基于php的PDO封装的一个套API , 是yii框架访问数据库的对象,具体使用的类时AcriceRecord ,
数据库的连接通常放在配置文件中,如:

......
'db' => [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=ddblog',
    'username' => 'root',
    'password' => 'xxxx',
    'charset' => 'utf8',

......

这些配置代码会创建一个yii\db\Connection对象,并使用这个对象来访问数据库,
这个数据库的连接对象的获取方法 : Yii::$app->db,
连接不同数据库,主要是修改dsn这个键对应的值,下面是常用的数据库的连接dsn,
mysql,mariaDB : mysql:host=localhost;dbname=mydbname
sqlLite : sqlite:/path/to/database/file

二 : AcriceRecord
简介:
1, ActiveRecord (活动记录类 , 是DAO 的具体实现类),
2, ActiveRecord 简称AR , 这类提供了一套面向对象的接口,用以访问数据库中的数据,
3, 一个AR类关联一张数据表 , 每个AR对象对应表中的一行,
4, AR对象的属性对应数据库的列,
5, 可以直接以面向对象的方式来操纵数据表中的数据,这样就不需要写SQL语句就能实现数据库的访问,
用法 :
1 创建
通过集成 yii\db\ActiveRecord基类来声明一个AR类,并实现tableName方法,返回与之关联的数据表名称
class Post extends \yii\db\ActiveRecord{
    public static function tableName(){
        return "post_table_name";//前提是这张表已经存在了
    }
}

2 查询
AR提供了两种方法来创建DB查询 , 结果都是返回AR对象
    2.1 yii\db\ActiveRecord::find()
        $model = Post::find()->where(['id'=>33])->one();//查询id为1的那一条记录
        $models = Post::find()->where(['status'=>1])->all();//查询status为1的多条记录
        以上两条查询方法可以用以下两条方法来代替
        Post::findOne(33);//查询主键为1的一条记录
        Post::findAll(['status'=>1]);//查询status为1的所有记录,返回对象数组

    2.1.1 ActiveRecord查询条件
        all()  执行查询,并返回AR对象数组
        one()  执行查询,并返回AR对象
        where()     查询条件
        orWhere()   查询条件
        andWhere()  查询条件
        orerBy()       排序
        addOrderBy()   排序
        count() 返回符合查询条件的记录数
        limit() 取出查询结果的条数
        with()  指定关联表的字段

    2.1.1.1 where()方法的参数
                    where 参数写法                         SQL语句写法
        and     ['and','id=1','id=2']               id = 1 AND id = 2
        or      ['or','id=1','id=2']                id=1 OR id=2
        in      ['in','id',[1,2,3]]                 IN(1,2,3)
        between  ['between','id',1 ,8]              id BETWEEN 1 AND 8
        like    ['like','name',['test','smample']]  name LIKE '%test%' AND name LIKE '%sample%'
        比较      ['>=','id',10]                     id>=10


    //查询所有status为2, 且author_id为1 , 且title中包含yii2 的所有结果,并按id升序排列
    $posts = Post::find()->where(['AND',['status'=>2], ['author_id'=>1],['like','title','yii2']])->orderBy('id')->all();


    2.2 yii\db\ActiveRecord::findBySql()
        如:
        $sql = 'SELECT * FROM post where status=1';
        $posts = Post::findBySql($sql)->all();


    2.3 数据操作CRUD
        yii\db\ActiveRecord::insert()
        yii\db\ActiveRecord::update()
        yii\db\ActiveRecord::delete()
        yii\db\ActiveRecord::save()   //save方法可代替insert和update方法

        插入一条数据:
        $customer = new Customer();
        $customer->name = "James";
        $customer->email = "James@sina.com";
        $customer->save(); //等同于$customer->insert();

        查找一条数据 略

        修改一条记录
        $customer = Customer::findOme($id);
        $customer->email = "new@sina.com";
        $customer->save(); 等同于$customer->update;

        删除一条记录
        $customer = Customer::findOme($id);
        $customer->delete();
 */
/*
$model = Post::find()->where(['id'=>33])->one();
var_dump($model);
直接通过物理路由访问这个文件是用不了Post类的 , 要走应用入口文件index.php才可以,否则不会创建应用主体积
*/
$model = Post::find()->where(['id'=>33])->one();
var_dump($model);
//echo "hello world";
