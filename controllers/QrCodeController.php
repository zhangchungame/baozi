<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-6
 * Time: 下午2:30
 */

namespace app\controllers;


use dosamigos\qrcode\QrCode;
use yii\web\Controller;
use yii\web\Response;

class QrCodeController extends Controller
{
    public function actionQrcode(){
        \Yii::$app->response->format=Response::FORMAT_RAW;
        $aaa= QrCode::png("http://www.baidu.com",'@uploadPath/zc.png');
        return $aaa;
    }
}