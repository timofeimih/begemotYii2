<?php
namespace backend\components;

use yii\base\Widget;
use yii\helpers\Html;

class KitFormPartWidget extends Widget {

    public $form;
    public $model;


    public function run(){

        $form = $this->form;
        $model = $this->model;
         if($model->hasAttribute('published')){
            echo $form->field($model, 'published')->checkbox();
         }
         if($model->hasAttribute('top'))
            echo $form->field($model, 'top')->checkbox();

    }

}