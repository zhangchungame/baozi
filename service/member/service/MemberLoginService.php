<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-5-25
 * Time: 下午5:42
 */

namespace app\service\member\service;


use app\service\common\StringCheck;
use app\service\member\exception\NoMobileException;
use app\service\member\models\MemberMod;
use yii\base\Exception;

class MemberLoginService
{
    /**
     * 多方式登录
     * @param $input
     * @return array|null|\yii\db\ActiveRecord
     * @throws Exception
     */
    public function login($input){
        if(empty($input['login_name'])){
            throw new Exception("用户名为空");
        }
        if(empty($input['password'])){
            throw new Exception("密码名为空");
        }
        $password=md5(\Yii::$app->params['passwordKey'].$input['password']);
        if(StringCheck::checkMobile($input['login_name'])){
            $member=MemberMod::find()->where(['mobile'=>$input['login_name']])->where(['password'=>$password])->one();
            if($member){
                return $member;
            }
        }

        $member=MemberMod::find()->where(['login_name'=>$input['login_name']])->where(['password'=>$password])->one();
        if($member){
            return $member;
        }
        throw new Exception('用户名或密码错误');
    }

    /**
     * 手机验证码登录
     * @param $input
     * @return array|null|\yii\db\ActiveRecord
     * @throws Exception
     */
    public function loginBySms($input){
        if(empty($input['mobile'])){
            throw new Exception("手机号为空");
        }
        if(!StringCheck::checkMobile($input['mobile'])){
            throw new Exception("手机号格式错误");
        }
        $member=MemberMod::find()->where(['mobile'=>$input['mobile']])->one();
        if($member){
            return $member->toArray();
        }
        throw new NoMobileException('手机号不存在');
    }

    /**
     *
     */
    public function memberSession($member){
        \Yii::$app->session->set('member_id',$member['id']);
        \Yii::$app->session->set('login_name',$member['login_name']);
        \Yii::$app->session->set('mobile',$member['mobile']);
    }
}