<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-6
 * Time: 下午4:14
 */

namespace app\service\activity\models;


use yii\db\ActiveRecord;

class QrActivityMod extends ActiveRecord
{
    public static function tableName()
    {
        return 'bz_activity';
    }
}