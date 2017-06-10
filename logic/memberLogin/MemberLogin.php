<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-5-25
 * Time: 下午5:58
 */

namespace app\logic\memberLogin;


use app\service\member\exception\NoMobileException;
use app\service\member\service\MemberLoginService;
use app\service\member\service\MemberRegistService;
use app\service\sms\service\LoginSmsService;

/**
 * 登录页面控制器
 * Class MemberLogin
 * @package app\logic\memberLogin
 */
class MemberLogin
{
    public function login($input){
        $memberLoginService=new MemberLoginService();
        try{
            $member=$memberLoginService->login($input);
            \Yii::$app->session->set('member_id',$member->id);
            \Yii::$app->session->set('login_name',$member->login_name);
            \Yii::$app->session->set('mobile',$member->mobile);
        }catch (\Exception $exception){
            throw $exception;
        }
    }
    public function catchSmsCode($input){
        $smsService=new LoginSmsService();
        $smsService->catchSms($input);
    }

    /**
     * 手机验证码登录,未注册自动注册
     * @param $input
     * @return array|null|\yii\db\ActiveRecord
     * @throws \Exception
     */
    public function loginSms($input){
        $memberService=new MemberLoginService();
        $smsService=new LoginSmsService();
        $smsService->validateSms($input);
        try{
            $member=$memberService->loginBySms($input);
        }catch (NoMobileException $e){
            $memberRegistService=new MemberRegistService();
            $memberRegistService->registByMobile($input);
            $member=$memberService->loginBySms($input);
        }catch (\Exception $e){
            throw $e;
        }
        $memberService->memberSession($member);
        return $member;
    }
}