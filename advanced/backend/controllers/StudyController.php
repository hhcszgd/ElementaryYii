<?php
namespace backend\controllers;

use Yii;
use common\models\Post;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
class StudyController extends Controller
{
    public function actionIndex()
    {
//        $this->activeRecordFind();
//        return $this->render('index');
        return $this->render('DDActiveRecord');
    }

    private function activeRecordFind(){
                echo "<br/>::::";
        $model = Post::find()->where(['id'=>33])->one();
        var_dump($model);
    }
}
