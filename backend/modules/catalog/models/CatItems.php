<?php

namespace app\backend\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%cat_items}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $name_t
 * @property integer $status
 * @property string $data
 * @property string $text
 * @property double $price
 * @property integer $catId
 * @property string $seo_title
 * @property string $Podpis
 * @property string $HARAKTERISTIKI
 * @property integer $published
 * @property string $update_time
 * @property integer $pub_date
 * @property integer $create_time
 * @property integer $order
 * @property integer $authorId
 * @property integer $top
 * @property string $bazovaya_komplektaciya
 * @property string $Standartnoe_oborudovanie
 * @property string $Osobennosti
 * @property string $sdasdasd
 * @property integer $quantity
 * @property integer $delivery_date
 * @property string $article
 * @property string $Test_novogo_polya2
 * @property string $Tekstpole
 * @property string $Nazvanie
 * @property string $Nazvanie123213213
 */
class CatItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cat_items}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_t', 'status', 'data', 'text', 'price', 'catId', 'seo_title', 'pub_date', 'create_time', 'order', 'authorId', 'sdasdasd', 'delivery_date', 'article'], 'required'],
            [['status', 'catId', 'published', 'pub_date', 'create_time', 'order', 'authorId', 'top', 'quantity', 'delivery_date'], 'integer'],
            [['data', 'text', 'Podpis', 'HARAKTERISTIKI', 'bazovaya_komplektaciya', 'Standartnoe_oborudovanie', 'Osobennosti', 'Test_novogo_polya2', 'Tekstpole', 'Nazvanie', 'Nazvanie123213213'], 'string'],
            [['price'], 'number'],
            [['name', 'name_t', 'sdasdasd', 'article'], 'string', 'max' => 100],
            [['seo_title'], 'string', 'max' => 255],
            [['update_time'], 'string', 'max' => 45]
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
            'status' => Yii::t('backend', 'Status'),
            'data' => Yii::t('backend', 'Data'),
            'text' => Yii::t('backend', 'Text'),
            'price' => Yii::t('backend', 'Price'),
            'catId' => Yii::t('backend', 'Cat ID'),
            'seo_title' => Yii::t('backend', 'Seo Title'),
            'Podpis' => Yii::t('backend', 'Podpis'),
            'HARAKTERISTIKI' => Yii::t('backend', 'Harakteristiki'),
            'published' => Yii::t('backend', 'Published'),
            'update_time' => Yii::t('backend', 'Update Time'),
            'pub_date' => Yii::t('backend', 'Pub Date'),
            'create_time' => Yii::t('backend', 'Create Time'),
            'order' => Yii::t('backend', 'Order'),
            'authorId' => Yii::t('backend', 'Author ID'),
            'top' => Yii::t('backend', 'Top'),
            'bazovaya_komplektaciya' => Yii::t('backend', 'Bazovaya Komplektaciya'),
            'Standartnoe_oborudovanie' => Yii::t('backend', 'Standartnoe Oborudovanie'),
            'Osobennosti' => Yii::t('backend', 'Osobennosti'),
            'sdasdasd' => Yii::t('backend', 'Sdasdasd'),
            'quantity' => Yii::t('backend', 'Quantity'),
            'delivery_date' => Yii::t('backend', 'Delivery Date'),
            'article' => Yii::t('backend', 'Article'),
            'Test_novogo_polya2' => Yii::t('backend', 'Test Novogo Polya2'),
            'Tekstpole' => Yii::t('backend', 'Tekstpole'),
            'Nazvanie' => Yii::t('backend', 'Nazvanie'),
            'Nazvanie123213213' => Yii::t('backend', 'Nazvanie123213213'),
        ];
    }
}
