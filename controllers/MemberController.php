<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-7
 * Time: 下午4:10
 */

namespace app\controllers;


use app\logic\memberLogin\MemberLogin;
use app\service\common\RespCommon;
use app\service\member\service\MemberLoginService;
use yii\web\Controller;

class MemberController extends Controller
{
    public function actionLogin(){
        $res=[
            'member_id'=>'9',
            'id'=>'9',
            'name'=>'13681736848',
            'mobile'=>'13681736848',
            'login_name'=>'13681736848'
        ];
        $memberService=new MemberLoginService();
        $memberService->memberSession($res);
        return RespCommon::successReturn($res);
        try{
            $login=new MemberLogin();
            $member=$login->loginSms($_POST);
            $res=[
                'member_id'=>$member['id'],
                'name'=>$member['name']==''?$member['login_name']:$member['name'],
                'login_name'=>$member['login_name']
            ];
            return RespCommon::successReturn($res);
        }catch (\Exception $e){
            return RespCommon::failReturn($e);
        }
    }
}