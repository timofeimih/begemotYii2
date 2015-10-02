<?php

namespace backend\components;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class OrderModelBehavior extends Behavior{
	public $orderAttribute = 'order';    
    public $modelOrder = 0;


	public function events()
	{
		return [
			ActiveRecord::EVENT_AFTER_FIND => 'setModelOrder',
			ActiveRecord::EVENT_BEFORE_INSERT => 'orderBeforeSave',
		];
	}
	
    
    public function orderUp(){
        return;
    }
    
    public function orderDown(){
        return;
    }
    
    public function setModelOrder ($event){
       $this->modelOrder = $this->getOwner()->order;
    }
    public function orderBeforeSave ($event){

        parent::beforeSave($event=null);
        if ($this->getOwner()->isNewRecord){
          if (isset($this->getOwner()->order)) {
         
            $criteria = new CDbCriteria;

            $criteria->select = 'MAX(`order`) as `order`';


            $order = $this->getOwner()->find($criteria);
            
            $this->getOwner()->order = $order->order+1;

            return $order->order+1;
          }
        }
        return 0;
    }
    
    
    public function getLastOrderValue()
    {
      return $this->orderBeforeSave();
    }
}