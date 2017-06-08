<?php

namespace app\module;

/**
 * manage module definition class
 */
class manage extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\module\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->setLayoutPath($this->getViewPath().DIRECTORY_SEPARATOR . 'layouts');
        $this->layout='main';
        // custom initialization code goes here
    }
}
