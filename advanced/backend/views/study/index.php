<?php

//use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

//$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<h1>this is my test detail view page</h1>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
//        'hello0',
        ['label'=>'哈喽1','value'=>$model['hello0']],
        'hello1',
        'hello2',
        'hello3',
        'hello4',
        'testTitle',
        ['label'=>'哈喽','value'=>'沃德'],
        ['label'=>'memedacacada','value'=>$model['testTitle']],

    ],
]) ?>