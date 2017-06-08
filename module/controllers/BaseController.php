<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 17-6-1
 * Time: 下午5:09
 */

namespace app\module\controllers;


use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class BaseController extends Controller
{
    public function init(){
        parent::init();
//        \Yii::$app->errorHandler->errorView
        \Yii::$app->errorHandler->errorAction='manage/base/error';
    }
    public function actionError()
    {
        $exception = \Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

    public function actionImageupload(){
        $image=UploadedFile::getInstanceByName('file');
        $ext = $image->getExtension();
        $imageName = time().rand(100,999).'.'.$ext;
        $imagePath=\Yii::getAlias('@uploadPath/').$imageName;
        $image->saveAs($imagePath);
        \Yii::$app->response->format=Response::FORMAT_JSON;
        return [
            'result'=>'OK',
            'id'=>123,
            'filename'=>$imageName
        ];
    }
}