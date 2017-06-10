<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-10
 * Time: 下午11:11
 */

namespace app\service\member\exception;


use yii\base\UserException;

class NotLoginException extends UserException
{
    protected $message="用户未登录";
    protected $code="520";
}