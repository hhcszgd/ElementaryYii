<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/5/5
 * Time: 11:10
 */



/*
 * DetailView : 小部件
 * 1 , 数据小部件
 * Yii提供了一套数据小部件widgets , 这些小部件可用于显示数据
 * DetailView小部件用于显示一条记录数据
 * ListView和GridView小部件能够用于显示一个拥有分页 , 排序 和 过滤功能的一个列表或者表格
 *
 * 2 , DetailView
 * 用来显示一条记录的详情, 下面这些都是一条记录的情况
 * 一个Model模型对象的数据
 * ActiveRecord类的一个实例对象
 * 由键值对构成的一个关联数组
 *
 * 3 , DetailView的创建
 * 调用DetailView::widget方法
 * 参数是一个关联数组
 * 第一个键  model对应的值可以是一个 控制器传过来的 模型类的实例 , 也可以是一个数组
 * 第二个键  attributes 对应的值也是一个关联数组,数组里的元素决定显示模型的哪些属性 , 以及如何格式化
 */

/* 创建方法 :::::
     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:ntext',
            'tags:ntext',
            'status',
            'create_time:datetime',
            'update_time:datetime',
            'author_id',
        ],
    ]) ?>
*/