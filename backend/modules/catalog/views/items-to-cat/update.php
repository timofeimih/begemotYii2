<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatItemsToCat */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Cat Items To Cat',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cat Items To Cats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="cat-items-to-cat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
