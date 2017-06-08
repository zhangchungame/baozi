<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-6
 * Time: 下午4:14
 */

namespace app\service\activity\service;


use app\service\activity\models\QrActivityMod;

class QrActivityService
{
    /**
     * 查单个二维码活动
     * @param $input
     * @throws \Exception
     */
    public function selectOne($input)
    {
        $qr = QrActivityMod::find();
        if(!empty($input['id'])){
            $qr=$qr->andWhere(['id'=>$input['id']]);
        }
        if(!empty($input['activity_id'])){
            $qr=$qr->andWhere(['activity_id'=>$input['activity_id']]);
        }
        $qr=$qr->one();
        if(!$qr){
            return [];
        }
        $res = $qr->toArray();
        return $res;
    }

    public function save($input){
        if(empty($input['activity_id'])||empty($input['qr_file_name'])){
            throw new \Exception("字段不全");
        }
        $qr = QrActivityMod::find();
        if(!empty($input['id'])){
            $qr=$qr->andWhere(['id'=>$input['id']]);
        }
        if(!empty($input['activity_id'])){
            $qr=$qr->andWhere(['activity_id'=>$input['activity_id']]);
        }
        $qr=$qr->one();
        if($qr==null){
            $qr=new QrActivityMod();
        }
        $qr->activity_id=$input['activity_id'];
        $qr->qr_file_name=$input['qr_file_name'];
        $qr->save();
        return $qr->toArray();
    }
}