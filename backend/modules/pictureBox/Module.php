<?php

namespace backend\modules\pictureBox;

use yii;

class Module extends \yii\base\Module
{

    public function init()
    {
        parent::init();

        Yii::$app->assetManager->publish('assets');
    }
}
