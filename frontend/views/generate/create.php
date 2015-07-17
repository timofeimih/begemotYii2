<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\CallButtons $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Call Buttons',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Call Buttons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-buttons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
