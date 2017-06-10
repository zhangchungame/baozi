<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-10
 * Time: 下午11:14
 */

namespace app\service\activity\service;


use app\service\activity\models\ActivityEnrollMod;

class ActivityEnrollService
{
    public function memberEnroll($input){
        if(empty($input['member_id']||empty($input['activity_id']))){
            throw new \Exception("参数缺失");
        }
        $mod=new ActivityEnrollMod();
        $mod->activity_id=$input['activity_id'];
        $mod->member_id=$input['member_id'];
        $mod->create_date=time();
        $mod->save();
        return $mod->toArray();
    }
    public function selectOne($input){
        $enroll=ActivityEnrollMod::find();
        if($input['member_id']){
            $enroll=$enroll->andWhere(['member_id'=>$input['member_id']]);
        }
        if($input['activity_id']){
            $enroll=$enroll->andWhere(['activity_id'=>$input['activity_id']]);
        }
        if($input['id']){
            $enroll=$enroll->andWhere(['id'=>$input['id']]);
        }
        $enroll=$enroll->one();
        if($enroll){
            return $enroll->toArray();
        }else{
            return [];
        }
    }
}