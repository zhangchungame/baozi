<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-5-26
 * Time: 上午9:55
 */

namespace app\controllers;


use app\logic\activity\ActivityCURD;
use app\service\common\RespCommon;
use yii\web\Controller;
use yii\web\Response;

class IndexController extends Controller
{
    public function actionIndex(){
        $data=[];
        return $this->render("index.php",$data);
    }

    public function actionActivity(){
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
        return $this->render("activity.php",$data);
    }

    public function actionTest(){
        $data=[];
        return $this->render("test.php",$data);
    }

}