<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-5-25
 * Time: 下午1:14
 */

namespace app\service\member\models;


use yii\db\ActiveRecord;

class MemberMod extends ActiveRecord
{
//    public $id;
//    public $name;
//    public $login_name;
//    public $password;
//    public $mobile;
//    public $open_id;

    public static function tableName()
    {
        return 'bz_member';
    }
}