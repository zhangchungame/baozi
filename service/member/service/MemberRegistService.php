<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-5-25
 * Time: 下午1:05
 */

namespace app\service\member\service;


use app\service\common\StringCheck;
use app\service\member\models\MemberMod;
use yii\db\Exception;
use yii\db\IntegrityException;

class MemberRegistService
{
    /**
     * 登录名注册
     * @param $meminput
     * @return MemberMod
     * @throws Exception
     */
    public function registByLoginName($meminput){
        if(!StringCheck::checkLoginName($meminput['login_name'])){
            throw new Exception("用户名需要是大小写字母数字和下划线，长度6-30位");
        }
        if(!StringCheck::CheckPassword($meminput['password'])){
            throw new Exception("密码需要包含字母和数字，长度6-30位");
        }
        $member=new MemberMod();
        $member->login_name=$meminput['login_name'];
        $member->password=md5(\Yii::$app->params['passwordKey'].$meminput['password']);
        $member->name=$meminput['name'];
        try{
            $member->insert();
        }catch (IntegrityException  $exception){
            throw new Exception('用户名已存在');
        }catch (Exception $exception){
            throw $exception;
        }
        return $member;
    }

    public function registByMobile($meminput){
        if(!StringCheck::checkMobile($meminput['mobile'])){
            throw new Exception('手机格式不正确');
        }
        $member=new MemberMod();
        $member->login_name=$meminput['mobile'];
        $member->password=md5(\Yii::$app->params['passwordKey']."222cccbbb333");
        $member->mobile=$meminput['mobile'];
        $member->open_id=$meminput['open_id'];
        try{
            $member->insert();
        }catch (IntegrityException  $exception){
            throw new Exception('手机号已存在');
        }catch (Exception $exception){
            throw $exception;
        }
        return $member;
    }
}