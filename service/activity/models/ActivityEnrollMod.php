<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-10
 * Time: 下午11:15
 */

namespace app\service\activity\models;


use yii\db\ActiveRecord;

class ActivityEnrollMod extends ActiveRecord
{
    public static function tableName()
    {
        return 'bz_activity_enroll';
    }
}