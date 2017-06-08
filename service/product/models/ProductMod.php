<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-1
 * Time: 下午3:24
 */

namespace app\service\product\models;


use yii\db\ActiveRecord;

class ProductMod extends ActiveRecord
{
    public static function tableName()
    {
        return 'bz_product';
    }
}