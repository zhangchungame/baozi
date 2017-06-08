<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-7
 * Time: 下午6:01
 */

namespace app\service\sms;


use yii\base\UserException;

class SmsCodeNotCorrectException extends UserException
{
    protected $code=511;
}