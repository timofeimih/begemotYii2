<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CatItemsToCat */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Cat Items To Cat',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cat Items To Cats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-items-to-cat-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
