<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatItemsRow */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cat-items-row-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'name_t')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'type')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'data')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
