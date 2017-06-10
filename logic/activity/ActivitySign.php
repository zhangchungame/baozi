<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-11
 * Time: 上午12:42
 */

namespace app\logic\activity;


use app\service\activity\service\ActivitySelectService;
use app\service\activity\service\ActivitySignService;
use app\service\member\exception\NotLoginException;
use app\service\member\service\MemberLoginService;

class ActivitySign
{
    public function sign($input){
        if(!$input['activity_id']){
            throw new \Exception("活动ID为空");
        }
        $conact['id']=$input['activity_id'];
        $service=new ActivitySelectService();
        $activity= $service->selectOne($conact);
        if(!$activity){
            throw new \Exception("活动未找到");
        }
        $memberLoginService=new MemberLoginService();
        $member=$memberLoginService->getMemberSession();
        $sign=[
            'activity_id'=>$input['activity_id'],
            'member_id'=>$member['member_id']
        ];
        $signService=new ActivitySignService();
        if($res=$signService->selectOne($sign)){
            return array_merge($res,$member);
        }
        $res= $signService->sign($sign);
        return array_merge($res,$member);
    }
}