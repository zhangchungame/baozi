<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-7
 * Time: 下午3:27
 */

namespace app\controllers;


use app\logic\memberLogin\MemberLogin;
use app\service\common\RespCommon;
use yii\web\Controller;

class SmsController extends Controller
{
    public function actionSend(){
        try{
            $logic=new MemberLogin();
            $logic->catchSmsCode($_POST);
            $res=[
                'mobile'=>$_POST['mobile']
            ];
            return RespCommon::successReturn($res);
        }catch (\Exception $e){
            return RespCommon::failReturn($e);
        }
    }
}