<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\catalog\models\search\CatItemsSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cat-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_t') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'catId') ?>

    <?php // echo $form->field($model, 'seo_title') ?>

    <?php // echo $form->field($model, 'Podpis') ?>

    <?php // echo $form->field($model, 'HARAKTERISTIKI') ?>

    <?php // echo $form->field($model, 'published') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'pub_date') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'authorId') ?>

    <?php // echo $form->field($model, 'top') ?>

    <?php // echo $form->field($model, 'bazovaya_komplektaciya') ?>

    <?php // echo $form->field($model, 'Standartnoe_oborudovanie') ?>

    <?php // echo $form->field($model, 'Osobennosti') ?>

    <?php // echo $form->field($model, 'sdasdasd') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'delivery_date') ?>

    <?php // echo $form->field($model, 'article') ?>

    <?php // echo $form->field($model, 'Test_novogo_polya2') ?>

    <?php // echo $form->field($model, 'Tekstpole') ?>

    <?php // echo $form->field($model, 'Nazvanie') ?>

    <?php // echo $form->field($model, 'Nazvanie123213213') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
