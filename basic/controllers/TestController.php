<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/2/22
 * Time: 15:31
 */

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\cookie;
use app\models\Test;
use app\models\Customer;
use app\models\Orders;

class TestController extends Controller
{
    //请求链接 http://ddyiiyii.com/index.php?r=test/test
    function actionTest(){
        echo "hello world";
    }
    //请求链接 http://ddyiiyii.com/index.php?r=test/index-page
    function actionIndexPage(){
        echo  "what are want to do";
    }
    ///对浏览器请求参数的获取,以及相关判断
    //请求链接 http://ddyiiyii.com/index.php?r=test/test-para&id=3
    function actionTestPara(){
        // 获取请求组件
        $request = YII::$app->request;//引入 use Yii;
        //$request = \YII::$app->request;//不引入 use Yii; 但用全局命名空间的形式使用\YII
        $id = $request->get("id" , "默认值");//获取get请求参数
//        $postPara= $request->post("postPara" , "默认值");//获取post请求参数
//        判断是不是get请求
        if($request->isGet){
            echo 'this is get request';
        }else if ($request->isPost){
            echo 'this is post request';
        }
        //获取用户id
        echo $request->userIP;
        echo  $id;//浏览器输出 3
    }

    ///对浏览器的请求做出响应的操作
    function actionTestResponse(){
        $res = YII::$app->response;
//        $res->statusCode = 200;//设置返回给浏览器的状态码
//        $res->headers->add("pragma","no-cache");//增加响应头设置:浏览器不要缓存
//        $res->headers->set("pragma","max-age=5");//修改响应头设置:浏览器缓存5秒
//        $res->headers->remove("pragma");//移除响应头pragma设置
        //跳转到百度
//        $res->headers->add("location","https://www.baidu.com");
        //或者这样跳
//        $this->redirect("https://www.baidu.com",302);
        //文件下载(浏览器一访问此链接,就会下载一个aa.jpg的文件)
//        $res->headers->add('content-disposition','attachment; filename="aa.jpg"');
        //或者这样下载
        $res->sendFile('./b.jpg');//让浏览器下载 跟index.php入口文件同级目录下 , 也就是web根目录下 的b.jpg文件
    }

    ///对session的操作
    function actionTestSession(){
        //获取session组件
        $session = \YII::$app->session;
        //判断session是否开启
        if ($session->isActive){
            //关闭session
            //$session->close()
            echo 'session is on';
        }else{
            //开启session
            $session->open();
            echo 'session is off';
        }
        //设置值 , 也可以用$session['user'] = '张 san';
        $session->set('user','zhang san');//session 保存位置在php.ini中的session.save_path对应的位置
        //获取值 , 也可以用$session['user']
        $session->get("user");//取数据
        //删数据 , 也可以用unset($session['user'])
        $session->remove('user');//删除
    }

    function actionTestCookie(){
        ///增加kookie
        ///
        $cookies = \YII::$app->response->cookies;//获取cookie集合对象
        //创建cookie实例化参数
        $cookie_data = array('name'=>'cookieName1' , 'value'=>'coolieValue1');
        //创建cookie对象
        $cookieOjb1 = new Cookie($cookie_data);
        //添加cookie
//        $cookies->add($cookieOjb1);// 在谷歌浏览器的application->storage->cookies中会增加一行键值对
//        根据cookie对象的name移除cookie
//        $cookies->remove("cookieName1");


        ///获取cookie值
        /// 1,获取从浏览器请求中获取coolies
        $_cookies = \YII::$app->request->cookies;
        $cookievalue1 = $_cookies->get('cookieName');//不带默认值
        $cookievalue = $_cookies->getvalue('cookieName',"default value");//带默认值
        echo $cookievalue;
    }
    //创建视图
    function actionTestShowHello(){
//        $this->layout = false   ;//手动关闭模板加载 render方法默认会加载模板 , renderPartial不加载模板
        //保证 /views/test/ShowHello.php文件存在
        return $this->renderPartial("ShowHello");
//        return $this->render("ShowHello");


//        $a = 1.00008;
//        for($i = 0 ; $i < 2 ; $i++){
//            $a *= 1.1;
//        }
//        echo $a;

    }
    //从控制器向视图传递数据
    function actionTestTransferData(){
//        //创建数组
//        $data = array();
//        //设置值
//        $data['view_hello_str'] = 'good morning';
        //创建数据
        $str = 'good morning ';
        //创建数组
        $data = array();
        //设置值
        $data['view_hello_str'] = $str;
        $data['arr'] = [1,2,3,4,5];
        $data['strWithJS'] = 'hello girl ! <script>alert(9)</script>';
        //渲染
        return $this->renderPartial('ShowHello',$data);
    }

    //请求连接 http://ddyiiyii.com/index.php?r=test/test-layout&para=helloworld
    //创建布局文件对象 在views/layout/testLayout //创建以后就不会加载系统的模板(包含头和脚视图) ,render默认加载模板 , renderPartial不加载模板 在action方法中设置$this->layout = false 也可以关闭加载模板
    public $layout = 'TestLayout';
    function actionTestLayout(){
        //获取布局对象 ,
        $request= YII::$app->request;
        $data = $request->get('para','default value ');
        $arr = ['key'=>$data];
        return $this->render('layout' ,$arr );//内容会保存在$content变量中
    }
    function actionViewInView()
    {
        $arr = ['data' => 'this is transfer data'];
        return $this->render('view1', $arr);//内容会保存在$content变量中
    }
    function actionTestBlock(){
        return $this->render('TestBlock' );//内容会保存在$content变量中
    }

    function actionTestSelect(){
        //查询方法1
//        $sql = 'select * from test where id = 1';
//        $results = Test::findBySql($sql)->all(); // 结果是一个test对象数组 , 对象数组占用的内存比字典数组占用的内存高
        //查询方法2
//        $sql = 'select * from test where id = :id';
//        $results = Test::findBySql($sql , array(':id' => '1'))->all();//把sql语句中的
        //:id替换成1 , 防止sql注入 , 如
//        $results = Test::findBySql($sql , array(':id' => '1 or 1=1'))->all();


        //查询方法3 当id = 1
//        $results = Test::find()->where(['id' => 1])->all();


        //查询方法4 当id > 0
//        $results = Test::find()->where(['>' ,'id' , 0])->all();
        //        查询方法4 当id >=1 且 id<= 2
//        $results = Test::find()->where(['between' ,'id' , 1 , 2])->all();

        //查询方法5 当 title like "%title 1%"
//        $results = Test::find()->where(['like' ,'title' , 'title 1'])->all();
//        print_r($results);


        //内存优化1,对象数组比字典(也叫关联数组)数组占用的内存高
        //通过->asArray可将对象数组转换成字典数组
//        $results = Test::find()->where(['like' ,'title' , 'title'])->asArray()->all();

        //内存优化2,批量查询batch(n) 代表每次从数据库取n条
        foreach (Test::find()->asArray()->batch(1) as $tests){//每次遍历取出一条数据,直到取完数据
            echo '</br>---------------执行遍历+1----------------</br>';
            print_r($tests);
        }

//        print_r($results);
    }

    function actionTestDelete(){
        $models = Test::find()->where(['id' => 1])->all();
        if ($models){
            print_r($models[0]);
            //执行删除方法1
//            $models[0]->delete();
            //执行删除方法2
//            Test::deleteAll();
//            Test::deleteAll('id>2');
            Test::deleteAll('id>:id' , array(':id'=>1));
        }else{

            echo 'no result';
        }
    }

    function actionTestInsert(){
        $obj = new Test;
        $obj->title = ' ';
        $obj->id = "lll";
        //注意 , 这里的数据要和数据库的数据格式一致才可以 , 或者保存之前有大小限制的判断
        //所以要提供一个验证的过程 , 在yii中提供了验证器 , 定义在模型类里面 , 如Test类中 ,
        //且 在保存之前 调用validate(); 来间接调用验证器
        $obj->validate();
        $obj->hasErrors();
        //通过hasErrors()判断是否有错误
        if($obj->hasErrors()){

            print_r($obj->errors);//当title字符大于5时 打印 : Array ( [title] => Array ( [0] => Title should contain at most 5 characters. ) )
            return;
        }
        $insertResult = $obj->save();
        echo $insertResult;
        echo  'dddd';
    }



    function actionTestUpdate(){
       $model = Test::find()->where(['id'=>1])->one();
       $model->title = 'this is title 11111';
       $model->save();
        echo  'dddd';
    }

    ///连表查询
    function actionSelectUnion1(){
        //根据顾客 查询她的订单信息
        $customer = Customer::find()->where(['name'=>'zhangsan'])->one();
//        $orders = $customer->hasMany('app\models\Orders' , ['customer_id'=>'id'])->asArray()->all();
        //改进1
//        $orders = $customer->hasMany(Orders::class  , ['customer_id'=>'id'])->asArray()->all();
        //改进2 , 发查询封装到模型类中
//        $orders = $customer->getOrders();
        //或者调用
        $orders = $customer->orders;
        print_r($orders);


    }

    ///连表查询
    function actionSelectUnion2(){
        //根据顾客 查询她的订单信息
        $order= Orders::find()->where(['id'=>1])->one();
        $customer = $order->customer;
        print_r($customer);


    }

    function actionInfo(){
        echo phpinfo();
    }

    function actionCreatePdo(){
//        $mysqli = new \mysqli('localhost','root','Swift_2018','ddtest');
        try{
            //方法1
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
            //方法2
//            $pdo = new \PDO('uri:mysqlPdo.ini','root','Swift_2018');//需要mysqlPdo.ini文件
            //方法3
//            $pdo = new \PDO('uri:mysqlPdo','root','Swift_2018');//需配置php.ini文件
        }catch (\PDOException $exception){
            dir('database connecting failure' . $exception->getMessage());
        }
        print_r($pdo);
        $pdo->setAttribute(\PDO::ATTR_AUTOCOMMIT , 1);//设置自动提交
        print_r($pdo->getAttribute(\PDO::ATTR_SERVER_INFO));
        print_r($pdo->getAttribute(\PDO::ATTR_CLIENT_VERSION));
    }


    function actionPdoQuery1(){
        try{
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
        }catch (\PDOException $exception){
            die('database connecting failure' . $exception->getMessage());
        }
        //2 执行查询,返回一个预处理对象
            $sql = 'select * from student';
            $result = $pdo->query($sql);
        //3 从预处理对象中取出数据
            $arrResult = $result->fetchAll();
            $api = ['status'=>200,'message'=>'success','data'=>$arrResult];
            $jsonStr = json_encode($api);
            echo $jsonStr;
//        print_r($arrResult);
//        print_r($arrResult[1]['name']);
        foreach ($arrResult as $item ){
            print_r($item['name'] . '<br>');
        }
        //4 释放
        $pdo = null ;
        $result = null ;
    }
    function actionPdoQuery2(){
        try{
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
        }catch (\PDOException $exception){
            die('database connecting failure' . $exception->getMessage());
        }
        $sql = 'select * from student';
        foreach ($pdo->query($sql) as $item){
            echo $item['name'] . 'xxxxxx' . "<br>";
        }
    }

    function actionPdoInsert(){
        try{
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
        }catch (\PDOException $exception){
            die('database connecting failure' . $exception->getMessage());
        }
        $sql = 'insert into student (name , height , introduce ) values ("xiao guang",180 , "this is bad boy")';
        $result = $pdo->exec($sql);
        if ($result){
            echo 'insert into successfully';
        }else{
            echo 'insert into failure ';
        }
    }

    function actionPdoDelete(){
        try{
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
        }catch (\PDOException $exception){
            die('database connecting failure' . $exception->getMessage());
        }
        $sql = 'delete from student where id = 4';
        $result = $pdo->exec($sql);
        if ($result){
            echo 'delete successfully';
        }else{
            echo 'delete failure ';
        }
    }

    function actionPdoUpdate(){
        try{
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
        }catch (\PDOException $exception){
            die('database connecting failure' . $exception->getMessage());
        }
        $sql = 'update student set   name = "da guang" , height = 177 where id = 4';
        $result = $pdo->exec($sql);
        if ($result){
            echo 'update successfully';
        }else{
            echo 'update failure ';
        }
    }

    function actionPdoException(){
        try{
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
//            \PDO::ERRMODE_WARNING
            //按教程设置不好用
            //$pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_WARNING);//设置错误报警,不做任何提示
//            $pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $exception){
            die('database connecting failure' . $exception->getMessage());
        }
        $sql = 'insert into studentttttttt set name = "da hua" , height= 178 , introduce="this is a teacher"';
        $result = $pdo->exec($sql);
        if ($result){
            echo ' successfully';
        }else{
            echo ($pdo->errorCode() . "<br>");
            print_r( $pdo->errorInfo());
        }
    }

    /**
    PDO预处理方法
    1 . prepare() // 用于执行查询sql语句,返回PDOStatement对象
    2 . bindValue() // 将值绑定到对应的一个参数,返回布尔值
    3 . bindParam() // 将参数绑定到形影的查询占位符上,返回布尔值
    4 . bindColumen() // 用来匹配列名和一个指定的变量名
    5 . excute() // 执行一个准备好了的预处理语句,返回布尔值
    6 . rowCount() // 返回使用增删改查操作语句后受影响的行总数
     */

    //问号式预处理sql语句 , 共有三种绑定方式
    function actionPdoPrepare1(){
        //1.连接数据库
        try{
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
        }catch (\PDOException $exception){
            die('database connecting failure' . $exception->getMessage());
        }
        //2.预处理的sql语句
        $sql = 'insert into student (id, name , height , introduce)values(?,?,?,?)';
        $result = $pdo->prepare($sql);
//        //3.对?号的参数绑定(第一种绑定方式)
//        $result->bindValue(1,null);//第一个问号对应的值(即id的值)
//        $result->bindValue(2,"xiao疆");//第二个问号对应的值(即name的值)
//        $result->bindValue(3,195);//第三个问号对应的值(即height的值)
//        $result->bindValue(4,"this is a not bad boy");//第四个问号对应的值(即introduce的值)

        //3.对?号的参数绑定(第二种绑定方式,)
        $id = null ;
        $name = "zhong jiang";
        $height = 178.0;
        $introduce = "this is a boy and girl ";
        $result->bindParam(1,$id);//第一个问号对应的值(即id的值)
        $result->bindParam(2,$name);//第二个问号对应的值(即name的值)
        $result->bindParam(3,$height);//第三个问号对应的值(即height的值)
        $result->bindParam(4,$introduce);//第四个问号对应的值(即introduce的值)



        //4.执行
//        $r = $result->execute(array(null,'中小将',183,'this is a fale'));//第三种绑定方式,直接写在执行参数里
        $r = $result->execute();
        echo $result->rowCount();//返回1表示执行成功
        if ($r){
            echo ' successfully';
        }else{
            echo ($pdo->errorCode() . "<br>");
            print_r( $pdo->errorInfo());
        }
    }

    //别名式预处理sql语句
    function actionPdoPrepare2(){
        //1.连接数据库
        try{
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
        }catch (\PDOException $exception){
            die('database connecting failure' . $exception->getMessage());
        }
        //2.预处理的sql语句
        $sql = 'insert into student (id, name , height , introduce)values(:id,:name,:height,:introduce)';//此处可以随便定义字段,对应就好
        $result = $pdo->prepare($sql);
//        //3.对?号的参数绑定(第一种绑定方式)
//        $result->bindValue("id",null);//第一个问号对应的值(即id的值)
//        $result->bindValue("name","xiao 小 疆");//第二个问号对应的值(即name的值)
//        $result->bindValue("height",191);//第三个问号对应的值(即height的值)
//        $result->bindValue("introduce","this is a not bad not bad boy");//第四个问号对应的值(即introduce的值)

        //3.对?号的参数绑定(第二种绑定方式,)
//        $id = null ;
//        $name = "zhong jiang jiang";
//        $height = 168.0;
//        $introduce = "this is a boy and girl and baby ";
//        $result->bindParam("id",$id);//第一个问号对应的值(即id的值)
//        $result->bindParam("name",$name);//第二个问号对应的值(即name的值)
//        $result->bindParam("height",$height);//第三个问号对应的值(即height的值)
//        $result->bindParam("introduce",$introduce);//第四个问号对应的值(即introduce的值)



        //4.执行
        $r = $result->execute(array("id"=>null,"name"=>'中小将',"height"=>183,"introduce"=>'this is a fale'));//第三种绑定方式,直接写在执行参数里
//        $r = $result->execute();
        echo $result->rowCount();//返回1表示执行成功
        if ($r){
            echo ' successfully';
        }else{
            echo ($pdo->errorCode() . "<br>");
            print_r( $pdo->errorInfo());
        }

    }

    //采用预处理sql执行查询,并采用绑定结果方式输出
    function actionPdoPrepare3(){
        //1.连接数据库
        try{
            $pdo = new \PDO('mysql:host=localhost;dbname=ddtest','root','Swift_2018');
        }catch (\PDOException $exception){
            die('database connecting failure' . $exception->getMessage());
        }
        //2.预处理的sql语句
        $sql = 'select id , name , height , introduce  from student';
        $result = $pdo->prepare($sql);
        $result->execute();
        $result->bindColumn(1,$id);
        $result->bindColumn(2,$name);
        $result->bindColumn("height",$height);
        $result->bindColumn("introduce",$introduce);
        while ($row=$result->fetch(\PDO::FETCH_COLUMN)){
            echo"{$id}:{$name}:{$height}:{$introduce}<br>";
        }
//        if ($result){
//            foreach ($result as $item){
//                print_r($item);
//            }
//        }else{
//            echo ($pdo->errorCode() . "<br>");
//            print_r( $pdo->errorInfo());
//        }
    }


}