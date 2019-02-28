<?php
/**
 * Created by PhpStorm.
 * User: wy
 * Date: 2019/2/26
 * Time: 11:00
 */

namespace app\models;

use yii\db\ActiveRecord;

class Orders  extends ActiveRecord
{
    public function getCustomer(){
        $customer = $this->hasOne(Customer::class , ['id'=>'customer_id'])->asArray();
        return $customer;
    }
}