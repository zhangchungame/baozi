<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-1
 * Time: 上午10:16
 */

namespace app\module\controllers;


use app\logic\productBackstage\ProductCURD;
use yii\base\UserException;
use yii\web\Response;
use yii\web\UploadedFile;

class ProductController extends BaseController
{

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
            '2'=>'price',
            '3'=>'store',
            '4'=>'create_date',
            '5'=>'update_date',
            '6'=>'status',
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
        $logic=new ProductCURD();
        $pageinfo=$logic->productSelectPage($input);
//        $count=$logic->productCount($input);
        $productsRes=[];
        foreach($pageinfo['products'] as $tmp){
            $val=[$tmp['id'],$tmp['name'],$tmp['price'],$tmp['store'],date("Y-m-d H:i:s",$tmp['create_date']),date("Y-m-d H:i:s",$tmp['update_date']),\Yii::$app->params['product_status'][$tmp['status']],'<a href="/?r=manage/product/create&id='.$tmp['id'].'" class="btn btn-sm btn-default btn-circle btn-editable"><i class="fa fa-pencil"></i> Edit</a>'];
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



    /**
     * 商品详情也
     * @return string
     */
    public function actionCreate(){
        $logic=new ProductCURD();
        $data=[];
        $data['product']=$logic->productSelect($_GET);
        return $this->render('create',$data);
    }



    /**
     * 接收数据创建商品
     */
    public function actionCreatedo(){
        $post=$_POST['product'];
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
            'short_description'=>$post['short_description'],
            'price'=>$post['price'],
            'store'=>$post['store'],
            'status'=>$post['status'],
            'main_image'=>$main_image,
            'image'=>$images,
        ];
        $product=(new ProductCURD())->productSave($input);
//        return $this->render('create');
        $this->redirect("/?r=manage/product/create&id=".$product['id']);
    }

}