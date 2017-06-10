<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-11
 * Time: 上午12:40
 */

namespace app\service\activity\models;


use yii\db\ActiveRecord;

class ActivitySignMod extends ActiveRecord
{
    public static function tableName()
    {
        return 'bz_activity_sign';
    }
}