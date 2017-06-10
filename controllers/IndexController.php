<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-5-26
 * Time: 上午9:55
 */

namespace app\controllers;


use app\logic\page\IndexLogic;
use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex(){
        $logic=new IndexLogic();
        $data=$logic->getInfo();
        return $this->render("index.php",$data);
    }



    public function actionTest(){
        $data=[];
        return $this->render("test.php",$data);
    }

}