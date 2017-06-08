<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-7
 * Time: 下午5:04
 */

namespace app\service\sms\service;


use app\service\common\StringCheck;
use app\service\common\ValidateCode;
use app\service\sms\SmsCodeNotCorrectException;

class LoginSmsService
{
    public function catchSms($input){
        if(!StringCheck::checkMobile($input['mobile'])){
            throw new \Exception("手机不正确");
        }
        $codeObj=new ValidateCode();
        $code=$codeObj->getCode();
        \Yii::$app->cache->set(md5('mobile_'.$input['mobile']),$code,300);
        return $code;
    }

    public function validateSms($input){
        if(!StringCheck::checkMobile($input['mobile'])){
            throw new SmsCodeNotCorrectException("手机不正确");
        }
        if(empty($input['smsCode'])){
            throw new SmsCodeNotCorrectException("验证码为空");
        }
        if(\Yii::$app->cache->get(md5('mobile_'.$input['mobile']))!=$input['smsCode']){
            throw new SmsCodeNotCorrectException("验证码不正确");
        }
        return true;
    }
}