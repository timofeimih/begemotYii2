<?php
namespace backend\components;

use Yii;
use \yii\db\ActiveRecord;



class ContentKitModel extends ActiveRecord {
    
    public function scopes(){
        return [
                'published' => [
                    'condition' => '`published`=1',
                ],
                'ordered' => [
                    'order' => '`order`'
                ],
                'isTop' => [
                    'condition' => '`top`=1'
                ]
            ];
    }


    public function behaviors(){
        return [
            'timestamp' => [
                 'class' => 'yii\behaviors\TimestampBehavior',
                 'attributes' => [
                     ActiveRecord::EVENT_BEFORE_INSERT => ['create_time', 'update_time'],
                     ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time'],
                 ],
             ],
            'AuthorBehavior' => ['class' => 'backend\components\AuthorBehavior'],
            'OrderModelBehavior' => ['class' => 'backend\components\OrderModelBehavior'],
        ];
    }

    public function rules(){
        return [
            ['published, top','safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'published' => 'Опубликованно',
            'top'=> 'Прикрепить'
        ];
    }

    public function beforeSave($insert){



        $table = Yii::$app->getDb()->getSchema()->getTable($this->owner->tableName());
        $columnNames = $table->getColumnNames();


        if (!array_search('pub_date',$columnNames)){
            $sql = "ALTER TABLE `".$this->tableName()."`
	                  ADD COLUMN `pub_date` INT(10) NOT NULL;";
            Yii::$app->db->createCommand($sql)->execute();
        }

        if (!array_search('create_time',$columnNames)){
            $sql = "ALTER TABLE `".$this->tableName()."`
	                  ADD COLUMN `create_time` INT(10) NOT NULL;";
            Yii::$app->db->createCommand($sql)->execute();
        }

        if (!array_search('update_time',$columnNames)){
            $sql = "ALTER TABLE `".$this->tableName()."`
	                  ADD COLUMN `update_time` INT(10) NOT NULL;";
            Yii::$app->db->createCommand($sql)->execute();
        }
        if (!array_search('published',$columnNames)){
            $sql = "ALTER TABLE `".$this->tableName()."`
	                    ADD COLUMN `published` TINYINT(1) NOT NULL;";
            Yii::$app->db->createCommand($sql)->execute();
        }

        if (!array_search('order',$columnNames)){
            $sql = "ALTER TABLE `".$this->tableName()."`
	                  ADD COLUMN `order` INT(10) NOT NULL;";
            Yii::$app->db->createCommand($sql)->execute();
        }

        if (!array_search('authorId',$columnNames)){
            $sql = "ALTER TABLE `".$this->tableName()."`
	                  ADD COLUMN `authorId` INT(10) NOT NULL;";
            Yii::$app->db->createCommand($sql)->execute();
        }

        if (!array_search('top',$columnNames)){
            $sql = "ALTER TABLE `".$this->tableName()."`
	                  ADD COLUMN `top` INT(10) NOT NULL;";
            Yii::$app->db->createCommand($sql)->execute();
        }

        if (isset($this->pub_date) && $this->pub_date==0 && $this->published==1){

           $this->pub_date = time();

        }

        parent::beforeSave();

        return true;
    }


}