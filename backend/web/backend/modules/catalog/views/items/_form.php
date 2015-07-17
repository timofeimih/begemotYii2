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

    <?php echo $form->field($model, 'name_t')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'status')->textInput() ?>

    <?php echo $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'price')->textInput() ?>

    <?php echo $form->field($model, 'catId')->textInput() ?>

    <?php echo $form->field($model, 'seo_title')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'Podpis')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'HARAKTERISTIKI')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'published')->textInput() ?>

    <?php echo $form->field($model, 'update_time')->textInput(['maxlength' => 45]) ?>

    <?php echo $form->field($model, 'pub_date')->textInput() ?>

    <?php echo $form->field($model, 'create_time')->textInput() ?>

    <?php echo $form->field($model, 'order')->textInput() ?>

    <?php echo $form->field($model, 'authorId')->textInput() ?>

    <?php echo $form->field($model, 'top')->textInput() ?>

    <?php echo $form->field($model, 'bazovaya_komplektaciya')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'Standartnoe_oborudovanie')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'Osobennosti')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'sdasdasd')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'quantity')->textInput() ?>

    <?php echo $form->field($model, 'delivery_date')->textInput() ?>

    <?php echo $form->field($model, 'article')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'Test_novogo_polya2')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'Tekstpole')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'Nazvanie')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'Nazvanie123213213')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
