<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-5
 * Time: 下午4:04
 */

namespace app\service\activity\service;


use app\service\activity\models\ActivityMod;

class ActivityUpdateService
{
    public function update($input)
    {
        if (empty($input['name']) || empty($input['image'])||empty($input['main_image']) || empty($input['begin_date']) || empty($input['end_date'])) {
            throw new \Exception("缺少参数");
        }
        if(is_array($input['image'])){
            $input['image']=json_encode($input['image']);
        }
        if(empty($input['id'])){
            $input['id']=0;
        }
        $activity=ActivityMod::find()->where(['id'=>$input['id']])->one();
        if($activity==null){
            $activity=new ActivityMod();
        }
        $activity->name=$input['name'];
        $activity->image=$input['image'];
        $activity->main_image=$input['main_image'];
        $activity->begin_date=strtotime($input['begin_date']);
        $activity->end_date=strtotime($input['end_date']);
        if($activity->isNewRecord){
            $activity->create_date=time();
        }
        $activity->update_date=time();
        $activity->save();
        return $activity->toArray();
    }
}