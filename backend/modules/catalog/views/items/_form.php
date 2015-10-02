<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatItems */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cat-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'text')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options'=>[
                'minHeight'=>200,
                'maxHeight'=>400,
                'buttonSource'=>true,
                'replaceDivs' => false,
                'imageUpload'=>Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'seo_title')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'quantity')->textInput() ?>

    <?php echo $form->field($model, 'article')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'delivery_date')->textInput() ?>

    
    <div class="form-group">
        <?=backend\components\KitFormPartWidget::widget([
            'form' => $form,
            'model' => $model
        ]);
        ?>
    </div>
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
