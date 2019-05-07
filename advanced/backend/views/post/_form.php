<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

<!--  <?= $form->field($model, 'status')->textInput() ?>  -->
    <?php
    //获取所有状态方法1 , 写死
    $allStatus = [1 => '草稿' , 2 => '已发布' ];
    ?>
    <?php
    //获取所有状态方法2 用AR的find方法获取 对象 集合
    $allStatusObjects = \common\models\Poststatus::find()->all();
    //参考yii2.0 类参考手册ArrayHelper  https://www.yiichina.com/doc/api/2.0/yii-helpers-arrayhelper
    $allStatus = \yii\helpers\ArrayHelper::map($allStatusObjects,'id','name');
    ?>
    <?php
    //获取所有状态方法3  Yii::$app->db->createCommand 传入 sql语句获取 关联数组 集合
    $allStatusArray = Yii::$app->db->createCommand('select id , name from PostStatus')->queryAll();
    $allStatus = \yii\helpers\ArrayHelper::map($allStatusObjects,'id','name');
    ?>
    <?php
    //获取所有状态方法3 用QueryBuilder
    $allStatusArray = Yii::$app->db->createCommand('select id , name from PostStatus')->queryAll();
    $allStatus = \yii\helpers\ArrayHelper::map($allStatusObjects,'id','name');
    ?>
    <?= $form->field($model , 'status')->dropDownList($allStatus, ['prompt'=>'请选择状态']); ?>


    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'author_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?  '新增' : '修改', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
