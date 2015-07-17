<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CatCategory */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cat-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'pid')->dropDownList(ArrayHelper::map($model::find()->all(), 'id', 'name')) ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => 70]) ?>
    
    <div class="form-group">
        <label class="control-label">Описание</label>

        <div style="text-align:right;">
            
            <?=Html::a('Расставить изображения', ['catCategory/tidyPost','id'=>$model->id], ['class'=>'btn btn-primary btn-xs']) ?>
        </div>

        <?php echo yii\imperavi\Widget::widget([
            'model' => $model,
            'attribute' => 'text',

            'options' => ['minHeight' => 300, 'codemirror' => 'true']
        ]); ?>

    </div>

    <?php echo $form->field($model, 'order')->textInput() ?>

    <?php echo $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php return; ?>

<div class="row">
        <?php echo $form->labelEx($model,'pid'); ?>
        <?php 
                $select =  ($model->isNewRecord ? '-1' : $model->pid);
                $listArray = CHtml::listData($model->findAll(),'id','name');
                $listArray[-1]='корневой уровень';
                   echo CHtml::dropDownList('CatCategory[pid]', $select,
              $listArray,
              array('empty' => '(Выберите категорию)'));
                ?>
        
        <?php echo $form->error($model,'pid'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>70)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'text'); ?>
        <?php

        echo '<div style="text-align:right;">';
        $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Расставить изображения',
            'type' => 'primary',
            'size' => 'mini',
            'url'=>array('catCategory/tidyPost','id'=>$model->id)
        ));
        echo '</div>';
        ?>
        <?php 
                        $this->widget('begemot.extensions.ckeditor.CKEditor',
       //$this->widget('CKEditor',
        //        $this->widget('//home/atv/www/atvargo.ru/protected/extensions/ckeditor/CKEditor', 
                array('model' => $model, 'attribute' => 'text', 'language' => 'ru', 'editorTemplate' => 'full',));
                ?>
        <?php echo $form->error($model,'text'); ?>
        <?php
        $this->widget('begemot.components.htmlClearPanel.htmlClearPanel',array('id'=>'CatCategory_text'));
        ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'seo_title'); ?>
        <?php echo $form->textField($model,'seo_title',array('size'=>60)); ?>
        <?php echo $form->error($model,'seo_title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'layout'); ?>
        <?php echo $form->textField($model,'layout',array('size'=>60)); ?>
        <?php echo $form->error($model,'layout'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'viewFile'); ?>
        <?php echo $form->textField($model,'viewFile',array('size'=>60)); ?>
        <?php echo $form->error($model,'viewFile'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'itemViewFile'); ?>
        <?php echo $form->textField($model, 'itemViewFile', array('size'=>60)); ?>
        <?php echo $form->error($model, 'itemViewFile'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget();
        
        // $picturesConfig = array();
        // $configFile = Yii::getPathOfAlias('webroot').'/protected/config/catalog/categoryPictureSettings.php';
        // if (file_exists($configFile)){
            
        //     $picturesConfig = require($configFile);
            
        //     $this->widget(
        //         'application.modules.pictureBox.components.PictureBox', array(
        //         'id' => 'catalogCategory',
        //         'elementId' => $model->id,
        //         'config' => $picturesConfig,
        //             )
        //     );
        // } else{
        //     Yii::app()->user->setFlash('error','Отсутствует конфигурационный файл:'.$configFile);
        // }
?>

</div><!-- form -->