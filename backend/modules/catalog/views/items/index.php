<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\catalog\models\search\CatItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Cat Items');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Catalog'), 'url' => ['items/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->context->menu = require(__DIR__ .'/../items/commonMenu.php');
?>
<div class="cat-items-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Cat Items',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'name_t',
            'status',
            'data:ntext',
            // 'text:ntext',
            // 'price',
            // 'catId',
            // 'seo_title',
            // 'Podpis:ntext',
            // 'HARAKTERISTIKI:ntext',
            // 'published',
            // 'update_time',
            // 'pub_date',
            // 'create_time:datetime',
            // 'order',
            // 'authorId',
            // 'top',
            // 'bazovaya_komplektaciya:ntext',
            // 'Standartnoe_oborudovanie:ntext',
            // 'Osobennosti:ntext',
            // 'sdasdasd',
            // 'quantity',
            // 'delivery_date',
            // 'article',
            // 'Test_novogo_polya2:ntext',
            // 'Tekstpole:ntext',
            // 'Nazvanie:ntext',
            // 'Nazvanie123213213:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
