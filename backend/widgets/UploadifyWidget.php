<?php
namespace backend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class UploadifyWidget extends Widget {
   
   public $filePath = ' '; 
   public $uploader = ' ';
   public $formDataJson = '';
    
   public function run(){
      
      return $this->render('index',array(
            'filePath'=>$this->filePath,
            'uploader'=>$this->uploader,
            'formDataJson'=>$this->formDataJson,
      ));
   } 
    
}
?>
