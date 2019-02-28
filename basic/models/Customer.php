<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/2/26
 * Time: 11:00
 */

namespace app\models;


use yii\db\ActiveRecord;

class Customer  extends ActiveRecord
{
    //帮助顾客获取订单信息
    public function getOrders(){


        $orders = $this->hasMany(Orders::class  , ['customer_id'=>'id'])->asArray()->all();
        return $orders;
    }
}