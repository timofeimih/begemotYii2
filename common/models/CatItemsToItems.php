<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cat_items_to_items}}".
 *
 * @property integer $id
 * @property integer $itemId
 * @property integer $toItemId
 */
class CatItemsToItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cat_items_to_items}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemId', 'toItemId'], 'required'],
            [['itemId', 'toItemId'], 'integer']
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
            'toItemId' => Yii::t('backend', 'To Item ID'),
        ];
    }
}
