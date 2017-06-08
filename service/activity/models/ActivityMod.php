<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-5
 * Time: 下午4:03
 */

namespace app\service\activity\models;


use yii\db\ActiveRecord;

class ActivityMod extends ActiveRecord
{
    public static function tableName()
    {
        return 'bz_activity';
    }
}