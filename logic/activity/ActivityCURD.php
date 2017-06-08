<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-5
 * Time: 下午4:09
 */

namespace app\logic\activity;


use app\service\activity\service\ActivitySelectService;
use app\service\activity\service\ActivityUpdateService;
use app\service\activity\service\QrActivityService;
use dosamigos\qrcode\QrCode;

class ActivityCURD
{
    public function activitySave($input){
        try{
            $activityService=new ActivityUpdateService();
            $active= $activityService->update($input);
            //创建二维码
            $condition=[
                'activity_id'=>$active['id'],
            ];
            $qractivityService=new QrActivityService();
            $qr=$qractivityService->selectOne($condition);
            if(!$qr){
                $qrfile_name=time().rand(100,999).'.png';
                QrCode::png("http://www.baidu.com",'@qrFilePath/'.$qrfile_name,Enum::QR_ECLEVEL_H,24,2,false);
                $input=[
                    'activity_id'=>$active['id'],
                    'qr_file_name'=>$qrfile_name,
                    ];
                $qr=$qractivityService->save($input);
            }
        }catch (\Exception $e){
            throw $e;
        }
    }
    /**
     * 选择一个活动
     * @param $input
     * @return array|null|\yii\db\ActiveRecord
     * @throws \Exception
     */
    public function activitySelect($input){
        if(empty($input['id'])){
            return [
                'image'=>[]
            ];
        }
        try{
            $service=new ActivitySelectService();
            $res= $service->selectOne($input);
            $res['begin_date']=date("Y-m-d",$res['begin_date']);
            $res['end_date']=date("Y-m-d",$res['end_date']);
            return $res;
        }catch (\Exception $e){
            throw $e;
        }
    }

    /**
     * 活动列表
     * @param $input
     * @return array
     */
    public function productSelectPage($input){
        if(!is_null($input['name'])){
            $input['name']=trim($input['name']);
        }
        if(!is_null($input['id'])){
            $input['id']=trim($input['id']);
        }
        if(!is_null($input['status'])){
            $input['status']=trim($input['status']);
        }
        $service=new ActivitySelectService();
        $res['products']= $service->selectList($input);
        $res['count']=$service->selectCount($input);
        return $res;
    }
}