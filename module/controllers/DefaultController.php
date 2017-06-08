<?php

namespace app\module\controllers;

use dosamigos\qrcode\lib\Enum;
use dosamigos\qrcode\QrCode;
use yii\web\Controller;

/**
 * Default controller for the `manage` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $aaa= QrCode::png("http://www.baidu.com",'/code/php/baozi/web/image/upload/zc5.png',Enum::QR_ECLEVEL_H,24,2,false);
        return $this->render('index');
    }
}
