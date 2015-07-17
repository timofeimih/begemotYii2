<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\catalog\models\search\CatCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Cat Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Cat Category',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pid',
            'name',
            'text:ntext',
            'order',
            // 'dateCreate',
            // 'dateUpdate',
            // 'status',
            // 'name_t',
            // 'level',
            // 'seo_title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
