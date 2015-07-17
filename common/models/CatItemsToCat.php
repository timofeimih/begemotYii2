<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cat_items_to_cat}}".
 *
 * @property integer $id
 * @property integer $itemId
 * @property integer $catId
 * @property integer $order
 */
class CatItemsToCat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cat_items_to_cat}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemId', 'catId', 'order'], 'required'],
            [['itemId', 'catId', 'order'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'itemId' => Yii::t('backend', 'Item ID'),
            'catId' => Yii::t('backend', 'Cat ID'),
            'order' => Yii::t('backend', 'Order'),
        ];
    }
}
