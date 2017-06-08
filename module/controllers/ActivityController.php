<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-5
 * Time: 下午3:10
 */

namespace app\module\controllers;


use app\logic\activity\ActivityCURD;
use yii\web\Response;

class ActivityController extends BaseController
{
    public function actionDetail(){
        $logic=new ActivityCURD();
        $data=[];
        $data['activity']=$logic->activitySelect($_GET);
        return $this->render('detail',$data);
    }

    /**
     * 接收数据创建商品
     */
    public function actionSave(){
        $post=$_POST['activity'];
        $images=$post['images'];
        $main_image='';
        foreach($images as $key=>&$tmp) {
            if ($key == $post['image_type']) {
                $main_image = $tmp['filename'];
                $tmp['check']=1;
                break;
            }
        }
        uasort($images,'app\service\common\ArrayCmp::cmp');
        $images=array_values($images);
        if(empty($main_image)&&$images){
            $main_image=$images[0]['filename'];
        }
        $input=[
            'id'=>$post['id'],
            'name'=>$post['name'],
            'begin_date'=>$post['begin_date'],
            'end_date'=>$post['end_date'],
            'main_image'=>$main_image,
            'image'=>$images,
        ];
        $activity=(new ActivityCURD())->activitySave($input);
//        return $this->render('create');
        $this->redirect("/?r=manage/activity/detail&id=".$activity['id']);
    }

    /**
     * 商品列表页面
     * @return string
     */
    public function actionList(){
        return $this->render('list');
    }

    /**
     * 商品列表获取数据
     * @return array
     */
    public function actionListajax(){
        \Yii::$app->response->format=Response::FORMAT_JSON;
        $table_column=[
            '0'=>'id',
            '1'=>'name',
            '2'=>'begin_date',
            '3'=>'end_date',
            '4'=>'create_date',
            '5'=>'update_date',
        ];
        $input=[
            'start'=>$_POST['start'],
            'length'=>$_POST['length'],
        ];
        if(!is_null($_POST['order'][0]['column'])){
            $input['orderby']=$table_column[$_POST['order'][0]['column']];
            $input['ordersort']=$_POST['order'][0]['dir'];
        }
        $input['name']=$_POST['name'];
        $input['id']=$_POST['id'];
        if(!is_null($_POST['status'])){
            $input['status']=$_POST['status'];
        }
        $logic=new ActivityCURD();
        $pageinfo=$logic->productSelectPage($input);
        $productsRes=[];
        foreach($pageinfo['products'] as $tmp){
            $val=[$tmp['id'],$tmp['name'],date("Y-m-d",$tmp['begin_date']),date("Y-m-d",$tmp['end_date']),date("Y-m-d H:i:s",$tmp['create_date']),date("Y-m-d H:i:s",$tmp['update_date']),'<a href="/?r=manage/activity/detail&id='.$tmp['id'].'" class="btn btn-sm btn-default btn-circle btn-editable"><i class="fa fa-pencil"></i> Edit</a>'];
            $productsRes[]=$val;
        }
        $ret=[
            'data'=>$productsRes,
            'draw'=>$_POST['draw'],
            'recordsTotal'=>$pageinfo['count'],
            'recordsFiltered'=>$pageinfo['count'],
        ];
        return $ret;
    }
}