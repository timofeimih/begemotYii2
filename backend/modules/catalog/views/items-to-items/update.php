<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatItemsToItems */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Cat Items To Items',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cat Items To Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="cat-items-to-items-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
