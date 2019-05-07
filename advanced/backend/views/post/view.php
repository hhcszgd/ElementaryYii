<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '到底删不删?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:ntext',//https://www.yiichina.com/doc/api/2.0/yii-i18n-formatter
            'tags:ntext',
//            'status',
            ['label'=>'状态','value'=>$model->status0->name],//重写键值
//            'create_time:datetime',
            ['attribute'=>'create_time',
                'value'=>date('Y-m-d H:i:s',$model->create_time),//php格式时间
                ],

            'update_time:datetime',
//            'author_id',
//            ['label'=>'作者','value'=>$model->author->nickname],//重写键值
//            ['attribute'=>'author_id','value'=>$model->author->nickname],//只重写值,键不变
            ['attribute'=>'author_id','label'=>'作者'],//只重写键,值不变
        ],
        //额外属性学习
        'template'=> '<tr><th style="width:120px;">{label}</th><td>{value}</td></tr>',
        'options' => ['class' => 'table table-striped table-bordered detail-view'],
    ]) ?>

</div>
