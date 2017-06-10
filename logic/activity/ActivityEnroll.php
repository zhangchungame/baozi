<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-10
 * Time: 下午11:07
 */

namespace app\logic\activity;


use app\service\activity\service\ActivityEnrollService;
use app\service\activity\service\ActivitySelectService;
use app\service\member\exception\NotLoginException;
use app\service\member\service\MemberLoginService;

class ActivityEnroll
{
    public function enroll($input){
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
        if(!$member=$memberLoginService->getMemberSession()){
            throw new NotLoginException();
        }
        $enroll=[
            'activity_id'=>$input['activity_id'],
            'member_id'=>$member['member_id']
        ];
        $enrollService=new ActivityEnrollService();
        if($res=$enrollService->selectOne($enroll)){
            return array_merge($res,$member);
        }
        $res= $enrollService->memberEnroll($enroll);
        return array_merge($res,$member);
    }
}