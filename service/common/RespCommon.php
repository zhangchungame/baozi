<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-7
 * Time: 下午3:30
 */

namespace app\service\common;


use yii\web\Response;

class RespCommon
{
    public static function successReturn($array){
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $res=[
            'code'=>'200',
            'data'=>$array,
            'msg'=>'success'
        ];
        return $res;
    }

    public static function failReturn(\Exception $exception){
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $res=[
            'code'=>'',
            'data'=>'',
            'msg'=>$exception->getMessage()
        ];
        if($exception->getCode()){
            $res['code']=$exception->getCode();
        }else{
            $res['code']=585;
        }
        return $res;
    }
}