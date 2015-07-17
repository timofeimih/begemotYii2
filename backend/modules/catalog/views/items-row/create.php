<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CatItemsRow */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Cat Items Row',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cat Items Rows'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-items-row-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
