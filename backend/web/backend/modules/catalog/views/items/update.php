<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatItems */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Cat Items',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cat Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="cat-items-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
