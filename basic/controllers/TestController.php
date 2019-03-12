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
}