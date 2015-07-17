<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\CallButtons $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
  'modelClass' => 'Call Buttons',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Call Buttons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="call-buttons-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
