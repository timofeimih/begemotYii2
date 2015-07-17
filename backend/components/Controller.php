<?php
namespace backend\components;

class Controller extends \yii\web\Controller
{

  public $menu = [];
  public $route = null;

  public function init(){
    parent::init();
  }
}