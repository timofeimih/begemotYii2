<?php

namespace app\backend\modules\catalog\models;

use Yii;

/**
 * This is the model class for table "{{%cat_category}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $name
 * @property string $text
 * @property integer $order
 * @property integer $dateCreate
 * @property integer $dateUpdate
 * @property integer $status
 * @property string $name_t
 * @property integer $level
 * @property string $seo_title
 */
class CatCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cat_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'order', 'dateCreate', 'dateUpdate', 'status'], 'integer'],
            [['text'], 'string'],
            [['name'], 'required'],
            [['name', 'name_t'], 'string', 'max' => 70],
            [['seo_title'], 'string', 'max' => 255],
            ['dateUpdate','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'
            ],
            ['dateCreate,dateUpdate','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'pid' => Yii::t('backend', 'Pid'),
            'name' => Yii::t('backend', 'Name'),
            'text' => Yii::t('backend', 'Text'),
            'order' => Yii::t('backend', 'Order'),
            'dateCreate' => Yii::t('backend', 'Date Create'),
            'dateUpdate' => Yii::t('backend', 'Date Update'),
            'status' => Yii::t('backend', 'Status'),
            'name_t' => Yii::t('backend', 'Name T'),
            'level' => Yii::t('backend', 'Level'),
            'seo_title' => Yii::t('backend', 'Seo Title'),
        ];
    }

    //Загружаем все категории в массив
    public function loadCategories(){
        $models = $this->findAll(array('order'=>'level desc'));
        
        $catsArray = array();
        
        foreach ($models as $category){
            $categoryArray = array();
            $categoryArray['id'] = $category->id;
            $categoryArray['pid'] = $category->pid;
            $categoryArray['name'] = $category->name;
            $categoryArray['order'] = $category->order;
            $categoryArray['level'] = $category->level;
            
            $catsArray[$category->id]=$categoryArray;
        }
        
        $this->categories = $catsArray;
    }
    
    public function beforeSave(){
        $this->name_t = $this->mb_transliterate($this->name);
        if ($this->isNewRecord){

                $this->orderBeforeSave();
               
            
        } 
        if ($this->pid==-1){
            $this->level=0;
        } else{
            $parentCategory = CatCategory::model()->findAll(array('condition'=>'id = '.$this->pid));
            $parentCategory = $parentCategory[0];
            $this->level=$parentCategory->level+1;
        }
        return true;
    }

    public function getCatArray(){
            if ($this->categories === null){
                $this->loadCategories();
            }
            return $this->categories;
        }
        
        //Возвращает имя категории по id
        public function getCatName($id){
            if ($id==-1){
                return ' верхний уровень';
            }
            $categories = $this->getCatArray();
            
            if (isset($categories[$id]))
                return $categories[$id]['name'];
            else
                return false;
        }
        //Возвращаем категории входящие в раздел
        public function getCatChilds($id){
            

           $array = $this->getCatArray();
           $resultArray= array();     
           
           foreach ($array as $element){
                if ($element['pid']==$id){
                    $resultArray[] = $element;
                }
       
           }
                
            return $resultArray;//array_filter($this->getCatArray(),$filter );
        }
       
        //Возвращаем категории входящие в раздел
        public function getAllCatChilds($id){
            
            $childs = $this->getCatChilds($id);
            $resultArray = $childs;
            if (count($childs)>0){
                
                foreach ($childs as $id=>$child){
                    $tmpChildsAray=array();
                    $tmpChildsAray = $this->getCatChilds($id);
                    $resultArray = array_merge($resultArray,$tmpChildsAray);
                } 
            }
            return $resultArray;
        }
        
        public function getCatChildsCount($id){
            return count($this->getCatChilds($id));
        }
        
        public function getCategory($id){
           
            $categories = $this->getCatArray();
            return $categories[$id];
        }
        
        public function getPid($id){
            $categories = $this->getCatArray();
            return $categories[$id]['pid'];
        }   
        
        public function getBreadCrumbs($id){
            $breadCrumbs = array();
            if ($id!=-1){
                $activeElement = $this->getCategory($id);
                $breadCrumbs[] = $activeElement;
                while ($activeElement['pid']!=-1){
                    $activeElement = $this->getCategory($activeElement['pid']);
                    $breadCrumbs[] = $activeElement;
                    break;
                }
            }
            return array_reverse($breadCrumbs);
        }
        
        public function categoriesMenu(){
             $categories = $this->getCatArray();

             $menu = $categories;

             foreach ($menu as $id=>&$item){
 
               if(isset($item['pid']) && $item['pid']!=-1){
                    if (!isset($menu[$item['pid']]['items']))
                            $menu[$item['pid']]['items']=array();
                    $item['label']=$item['name'];
                    $item['url']=array('catItemsToCat/admin','id'=>$id);
                    $item['itemOptions']=array('style'=>'123123');
                  
                    $menu[$item['pid']]['items'][$item['id']] = $item;

                    
                   unset($menu[$id]);
                } else{
                    $menu[$id]['label']= $item['name'];
                    if (!isset($menu[$id]['items'])){
                        $menu[$id]['url']=array('catItemsToCat/admin','id'=>$id);
                    }
                }
             }

             return $menu;
        }
        
        //get picture fav list array
        public function getCatFavPictures(){
          
            $imagesDataPath = Yii::getPathOfAlias('webroot').'/files/pictureBox/catalogCategory/'.$this->id;  
          
             $favFilePath = $imagesDataPath.'/favData.php'; 
             $images = array();
             if (file_exists($favFilePath)){
                  $images = require($favFilePath);
                };
                
             return $images;
                
        }
        
        //get picture list array
        public function getCatPictures(){
            $imagesDataPath = Yii::getPathOfAlias('webroot').'/files/pictureBox/catalogCategory/'.$this->id;
          
            $favFilePath = $imagesDataPath.'/data.php'; 
            $images = array();
            if (file_exists($favFilePath)){
                 $images = require($favFilePath);
               };
            if (isset($images['images'])){
                return $images['images'];
            } else{
                return null;
            }
        }       

        //get picture list array
        public function getCatVideos(){
            $imagesDataPath = Yii::getPathOfAlias('webroot').'/files/pictureBox/catalogCategoryVideo/'.$this->id;
          
            $favFilePath = $imagesDataPath.'/data.php'; 
            $images = array();
            if (file_exists($favFilePath)){
                 $images = require($favFilePath);
               };
            if (isset($images['images'])){
                return $images['images'];
            } else{
                return null;
            }
        }  
        
        //get path of one main picture, wich take from fav or common images list
        public function getCatMainPicture($tag=null){
            
            $imagesDataPath = '@storage/files/pictureBox/catalogCategory/'.$this->id;
            $favFilePath = $imagesDataPath.'/favData.php'; 
            
            $images = array ();
            $catalogImage = '';
            
            $images = $this->getCatFavPictures();
            if (count($images)!=0){
              $imagesArray = array_values($images);
              $catalogImage = $imagesArray[0];
            }
            
            if (count($images)==0){
                
                    $images = $this->getCatPictures();
                    if ($images!==null){
                        $imagesArray = array_values($images);
                        $catalogImage = $imagesArray[0];
                    } else {
                        return '#';
                    }
                
            }
            if (is_null($tag)){
                return array_shift($catalogImage);
            }
            else{
                if (isset($catalogImage[$tag]))
                    return $catalogImage[$tag];
                else
                    return '#';
            }
        }
}
