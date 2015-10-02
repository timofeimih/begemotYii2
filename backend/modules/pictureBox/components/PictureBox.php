<?php
namespace backend\modules\pictureBox\components;

use Yii;
use yii\base\Widget;

class PictureBox extends Widget {

    //Идентификатор множестка
    //например:books

    public $id = null;
    //Идентификатор элемента множества
    //например:1,2,3,4 и т.д. 
    public $elementId = null;
    public $config = array();
    
    public $divId = 'pictureBox';

    public function init() {
        if (!file_exists(Yii::getAlias('@storage') . '/web/files/pictureBox/')) {
            mkDir(Yii::getAlias('@storage') . '/web/files/pictureBox/',777);
        }
    }

    public function run() {
        $defaultConfig = array(
    
            'nativeFilters'=>array(
              'admin' =>true,
            ),    
            'filtersTitles'=>array(
              'admin' =>'Системный',  

            ),
            'imageFilters' => array(
                'admin' => array(
                    0 => array(
                        'filter' => 'CropResize',
                        'param' => array(
                            'width' => 298,
                            'height' => 198,
                        ),
                    ),
                ),
            )
        );
        $this->config = array_merge_recursive($defaultConfig,$this->config);

        if (session_id()=='')
            session_start();
        
        $_SESSION['pictureBox']=array($this->id.'_'.$this->elementId=>$this->config);
        
        
        return $this->renderContent();
    }

    protected function renderContent() {
        return $this->render('pictureBoxView',array('id'=>$this->id,'elementId'=>$this->elementId,'config'=>$this->config));   
        
    }

    static public function crPhpArr($array, $file) {
        
      
        $code = "<?php
  return
 " . var_export($array, true) . ";
?>";
          file_put_contents($file, $code);
//          chmod ($file, 0777);

    }

}

?>