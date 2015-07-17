<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatCategory */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cat-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'pid')->textInput() ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => 70]) ?>

    <?php echo $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'order')->textInput() ?>

    <?php echo $form->field($model, 'dateCreate')->textInput() ?>

    <?php echo $form->field($model, 'dateUpdate')->textInput() ?>

    <?php echo $form->field($model, 'status')->textInput() ?>

    <?php echo $form->field($model, 'name_t')->textInput(['maxlength' => 70]) ?>

    <?php echo $form->field($model, 'level')->textInput() ?>

    <?php echo $form->field($model, 'seo_title')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
