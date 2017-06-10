<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-11
 * Time: 上午12:40
 */

namespace app\service\activity\service;


use app\service\activity\models\ActivitySignMod;

class ActivitySignService
{
    public function sign($input){
        if(empty($input['member_id']||empty($input['activity_id']))){
            throw new \Exception("参数缺失");
        }
        $mod=new ActivitySignMod();
        $mod->activity_id=$input['activity_id'];
        $mod->member_id=$input['member_id'];
        $mod->create_date=time();
        $mod->save();
        return $mod->toArray();
    }

    public function selectOne($input){
        $sign=ActivitySignMod::find();
        if($input['member_id']){
            $sign=$sign->andWhere(['member_id'=>$input['member_id']]);
        }
        if($input['activity_id']){
            $sign=$sign->andWhere(['activity_id'=>$input['activity_id']]);
        }
        if($input['id']){
            $sign=$sign->andWhere(['id'=>$input['id']]);
        }
        $sign=$sign->one();
        if($sign){
            return $sign->toArray();
        }else{
            return [];
        }
    }
}