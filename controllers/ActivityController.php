<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-10
 * Time: 下午10:58
 */

namespace app\controllers;


use app\logic\activity\ActivityCURD;
use app\logic\activity\ActivityEnroll;
use app\logic\activity\ActivitySign;
use app\service\common\RespCommon;
use yii\web\Controller;

class ActivityController extends Controller
{
    /**
     * 活动详情
     * @return string|void
     */
    public function actionDetail(){
        $input=[
            'id'=>$_GET['id'],
        ];
        if(empty($input['id'])){
            $this->redirect("/");
            return;
        }
        $logic=new ActivityCURD();
        $activity=$logic->activitySelect($input);

        $data['activity']=$activity;
        return $this->render("detail.php",$data);
    }

    /**
     * 活动报名
     * @return array
     */
    public function actionEnroll(){
        try{
            $logic=new ActivityEnroll();
            $res=$logic->enroll($_POST);
            return RespCommon::successReturn($res);
        }catch (\Exception $e){
            return RespCommon::failReturn($e);
        }
    }

    public function actionSign(){
        $data=[];
        try{
            $input=[
                'activity_id'=>$_GET['activity_id']
            ];
            $logic=new ActivitySign();
            $data=$logic->sign($input);
        }catch (\Exception $e){

        }
        return $this->render('sign',$data);
    }
}