<?php
namespace backend\controllers;

//use Yii;
//use common\models\User;
//use common\models\UserSearch;
//use yii\web\Controller;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;
class StudyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index' , [
            'model' => ['hello0'=>'world1' ,
                        'hello1'=>'world2' ,
                        'hello2'=>'world3' ,
                        'hello3'=>'world4' ,
                        'hello4'=>'I love my Country I love my Country I love my Country I love my Country I love my Country I love my Country I love my Country I love my Country I love my Country I love my Country I love my Country I love my Country <br/>I love my Country <br/>I love my Country<br/> I love my Country<br/>' ,
                        'testTitle'=>'国破山河在,城春草木深,感时花溅泪,恨别鸟惊心' ,
                        ],
        ]);
    }

}
