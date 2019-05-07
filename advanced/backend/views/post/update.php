<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = 'x修改文章: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>
<!--view中调用render方法不会应用布局-->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
