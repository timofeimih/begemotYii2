<?php

namespace backend\modules\catalog\models;

use Yii;
use backend\components\ContentKitModel;


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
 * @property integer $published
 * @property string $update_time
 * @property integer $pub_date
 * @property integer $create_time
 * @property integer $order
 * @property integer $authorId
 * @property integer $top
 * @property integer $quantity
 * @property integer $delivery_date
 * @property string $article
 */
class CatItems extends ContentKitModel
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
            [['name',], 'required'],
            [['status', 'quantity'], 'integer'],
            [['seo_title'], 'string', 'max' => 255]
        ];
    }

    public function behaviors()
    {
        $behaviors = [
            'slug' => [
                'class' => 'backend\components\SlugBehavior',
            ],

        ];

        return array_merge($behaviors, parent::behaviors());
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
            'order' => Yii::t('backend', 'Order'),
            'authorId' => Yii::t('backend', 'Author ID'),
            'top' => Yii::t('backend', 'Top'),
            'quantity' => Yii::t('backend', 'Quantity'),
            'delivery_date' => Yii::t('backend', 'Delivery Date'),
            'article' => Yii::t('backend', 'Article'),
        ];
    }

    public function beforeSave($insert)
    {

        $this->name_t = $this->mb_transliterate($this->name);
        //$this->Video = $_REQUEST['CatItem']['Video'];
        $this->delivery_date = strtotime($this->delivery_date);
        $itemAdditionalRows = CatItemsRow::findAll([]);
        if (is_array($itemAdditionalRows)) {

            foreach ($itemAdditionalRows as $itemRow) {

                $paramName = $itemRow->name_t;
                if (isset($_REQUEST['CatItem'][$itemRow->name_t])) {
                    if (is_array($_REQUEST['CatItem'][$itemRow->name_t])) {
                        $this->$paramName = implode(',', $_REQUEST['CatItem'][$itemRow->name_t]);
                    } else $this->$paramName = $_REQUEST['CatItem'][$itemRow->name_t];
                }


            }
        }
        return true;
    }



    public function afterFind()
    {
        $this->delivery_date = date('m/d/Y', $this->delivery_date);

        return true;
    }


    public function afterSave($insert)
    {
        $this->delivery_date = date('m/d/Y', $this->delivery_date);

        return true;
    }


    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($id = null)
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        if ($id === null)
            $criteria->compare('id', $this->id);
        else
            $criteria->compare('id', $id);

        $criteria->compare('name', $this->name, true);
        $criteria->compare('name_t', $this->name_t, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('data', $this->data, true);
        $criteria->order = '`id` desc';
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    //get picture fav list array
    public function getItemFavPictures()
    {

        $imagesDataPath = Yii::getPathOfAlias('webroot') . '/files/pictureBox/catalogItem/' . $this->id;

        $favFilePath = $imagesDataPath . '/favData.php';
        $images = array();
        if (file_exists($favFilePath)) {
            $images = require($favFilePath);

        };

        return $images;

    }


    //get picture list array
    public function getItemPictures()
    {

        $imagesDataPath = Yii::getPathOfAlias('webroot') . '/files/pictureBox/catalogItem/' . $this->id;
        $favFilePath = $imagesDataPath . '/data.php';
        $images = array();

        if (file_exists($favFilePath)) {

            $images = require($favFilePath);
            if (isset($images['images']))
                return $images['images'];
            else
                return array();
        } else {


            return array();
        }

    }

    public function getItemWithMaximalPrice($catId)
    {
        $returnPrice = 0;


        $criteria = new CDbCriteria;
        $criteria->select='max(i.price) as maxprice';
        $criteria->with = array('item' => array('alias' => 'i'));
        $criteria->condition = 't.catId = :catId AND i.published = :published';
        $criteria->params = array(':catId' => $catId, ':published' => 1);
        $price = CatItemsToCat::model()->find($criteria);



        if(isset($price->maxprice)) $returnPrice = $price->maxprice;

        return (int) $returnPrice;
    }

    //get path of one main picture, wich take from fav or common images list
    public function getItemMainPicture($tag = null)
    {


        $imagesDataPath = Yii::getPathOfAlias('webroot') . '/files/pictureBox/catalogItem/' . $this->id;
        $favFilePath = $imagesDataPath . '/favData.php';

        $images = array();
        $itemImage = '';

        $images = $this->getItemFavPictures();
        if (count($images) != 0) {
            $imagesArray = array_values($images);
            $itemImage = $imagesArray[0];
        }
        if (count($images) == 0) {

            $images = $this->getItemPictures();
            if (count($images) > 0) {
                $imagesArray = array_values($images);
                $itemImage = $imagesArray[0];
            } else {
                return '#';
            }

        }

        if (is_null($tag)) {
            return array_shift($itemImage);
        } else {
            if (isset($itemImage[$tag]))
                return $itemImage[$tag];
            else
                return '#';
        }
    }

    public function searchInModel($queryWord)
    {
      $queryWord = addcslashes($queryWord, '%_'); // escape LIKE's special characters
      $criteria = new CDbCriteria( array(
          'condition' => "name LIKE :match",
          'params'    => array(':match' => "%$queryWord%") 
      ) );

      $items = CatItem::model()->findAll( $criteria ); 

      return $items;
    }
    
    public function combinedWithParser()
    {

        if (isset(Yii::$app->modules['parsers'])) {
            $model = ParsersLinking::model()->find("`toId`='" . $this->id . "'");

            if ($model) {
                return '<span class="icon icon-big icon-random"></span>';
            } else return "Нет";

        }

        return null;
    }
}
