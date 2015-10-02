<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\CatCategory */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Cat Category',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cat Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="cat-category-update">

    

</div>


<h1>Update CatCategory <?php echo $model->id; ?></h1>
<?php echo Nav::widget([
    'options' => ['class' => 'nav nav-pills', 'style' => 'float:none;'],
    'items' => [
        ['label'=>'Данные', 'url'=>['/catalog/category/update/', 'id' => $model->id, 'tab' => 'data'], 'active'=>$tab=='data'],
        ['label'=>'Изображения', 'url'=>['/catalog/category/update/', 'id' => $model->id, 'tab' => 'photo'], 'active'=>$tab=='photo'],
        ['label'=>'Видео', 'url'=> ['/catalog/category/update/', 'id' => $model->id, 'tab' => 'video'], 'active'=>$tab=='video'],
    ]
]);?>


<?php
    if ($tab=='data'){
        echo $this->render('_form', [
	        'model' => $model,
	    ]);
    	//$this->renderPartial('messageWidget');
    }
?>


<?php if ($tab=='photo'){ ?>

<?php 
        
    $picturesConfig = array();
    $configFile = Yii::getAlias('@backend').'/config/catalog/categoryPictureSettings.php';
    if (file_exists($configFile)){

        $picturesConfig = require($configFile);

        echo backend\modules\pictureBox\components\PictureBox::widget([
            'id' => 'catalog-category',
            'elementId' => $model->id,
            'config' => $picturesConfig,
        ]);
    } else{
        Yii::app()->user->setFlash('error','Отсутствует конфигурационный файл:'.$configFile);
    }
?>    
<?php } ?>

<?php if ($tab=='video'){ ?>

<div id='video'>

Алгоритм работы таков. После добавления изображения, надо указывать в парамметрах "video_url" урл для видео и нажимать на сохранить зоголовок каждый раз. Парамметр видео урл находится на месте "alt", то есть если сохранил заголовок, то там и должно быть урл видео.
<br/>
Сама ссылка должна содержать только сам код ролика(Например: Ghnz9pLsAc)
<?php 
        
    $picturesConfig = array();
    $configFile = Yii::getPathOfAlias('webroot').'/protected/config/catalog/categoryPictureSettings.php';
    if (file_exists($configFile)){

        $picturesConfig = require($configFile);

        $this->widget(
            'application.modules.pictureBox.components.PictureBox', array(
            'id' => 'catalogCategoryVideo',
            'elementId' => $model->id,
            'config' => $picturesConfig,
          )
        );
    } else{
        Yii::app()->user->setFlash('error','Отсутствует конфигурационный файл:'.$configFile);
    }
?>    

</div>

<script>
  $(function(){
    var html = $("#video").find("FORM").html();

    if(html != undefined){
      html = html.replace('alt:', 'video_url:');
      $("#video").find("FORM").html(html);
    }
  })
</script>
<?php } ?>