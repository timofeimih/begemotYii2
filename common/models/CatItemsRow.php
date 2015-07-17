<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cat_items_row}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $name_t
 * @property string $type
 * @property integer $data
 */
class CatItemsRow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cat_items_row}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_t', 'type', 'data'], 'required'],
            [['data'], 'integer'],
            [['name', 'name_t'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'name_t' => Yii::t('backend', 'Name T'),
            'type' => Yii::t('backend', 'Type'),
            'data' => Yii::t('backend', 'Data'),
        ];
    }
}
