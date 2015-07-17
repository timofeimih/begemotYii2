<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\catalog\models\search\CatCategorySearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cat-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'text') ?>

    <?= $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'dateCreate') ?>

    <?php // echo $form->field($model, 'dateUpdate') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'name_t') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'seo_title') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
