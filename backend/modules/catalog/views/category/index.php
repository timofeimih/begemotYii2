<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\catalog\models\search\CatCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Cat Categories');
$this->params['breadcrumbs'][] = $this->title;
$this->context->menu = require(__DIR__ .'/../items/commonMenu.php');
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
            [
                'format' => ['image', ['width'=>'120','height'=>'120']],
                'value' => function($data) { return $data->getCatMainPicture(); },
            ],
            [
                'format' => 'raw',
                "label"=>"Категории",
                "value"=> function($data){
                    return Html::a($data->name."(".$data->getCatChildsCount($data->id).")",Url::to(["/catalog/category/index", "pid"=>$data->id]));
                },
            ],
            'id',
            'pid',
            'name',
            //'text:ntext',
            'order',
        // 'dateCreate',
            // 'dateUpdate',
             'status',
            // 'name_t',
            // 'level',
            // 'seo_title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
