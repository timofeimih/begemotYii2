<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CatCategory */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Cat Category',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cat Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
