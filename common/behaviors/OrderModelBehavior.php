<?php
namespace common\behaviors;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;
class OrderModelBehavior extends Behavior {
    
    public $orderAttribute = 'order';    
    
    public $modelOrder = 0;
    
    public function orderUp(){
        return;
    }
    
    public function orderDown(){
        return;
    }
    
    public function afterFind ($event){
       $this->modelOrder = $this->owner->order;
    }
    public function beforeSave ($event=null){


        if ($this->owner->isNewRecord){
          if (isset($this->owner->order)) {

            $order = $this->owner->find()->select('MAX(`order`) as `order`')->one();
            
            $this->owner->order = $order->order+1;

            return $order->order+1;
          }
        }
        return 0;
    }
    
    public function orderBeforeSave(){
        $this->beforeSave();
    }
    
    public function getLastOrderValue()
    {
      return $this->beforeSave();
    }
}

?>
