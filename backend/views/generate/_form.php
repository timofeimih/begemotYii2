<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\CallButtons $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="call-buttons-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model)?>

    <?= $form->field($model, 'phone')->textInput(['placeholder' => '7382183231']) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => 255, 'placeholder' => 'http://example.ru']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
