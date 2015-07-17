<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CatItems */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Cat Items',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cat Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-items-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
