<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-11
 * Time: 上午12:55
 */

namespace app\logic\activity;


use app\service\activity\service\ActivitySelectService;
use app\service\activity\service\QrActivityService;
use yii\base\UserException;

class QrActivity
{
    public function getQrActivity($input){
        if(empty($input['activity_id'])){
            throw new UserException("缺少参数");
        }
        $service=new QrActivityService();
        $qr=$service->selectOne($input);
        $service=new ActivitySelectService();
        if(!$qr){
            throw new UserException("未找到");
        }
        $input=['id'=>$input['activity_id']];
        $activity=$service->selectOne($input);
        if(!$activity){
            throw new UserException("未找到");
        }
        $res=[
            'qr'=>$qr,
            'activity'=>$activity
        ];
        return $res;
    }
}