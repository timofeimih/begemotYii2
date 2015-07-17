<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CatItems */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cat Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-items-view">

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'name_t',
            'status',
            'data:ntext',
            'text:ntext',
            'price',
            'catId',
            'seo_title',
            'Podpis:ntext',
            'HARAKTERISTIKI:ntext',
            'published',
            'update_time',
            'pub_date',
            'create_time:datetime',
            'order',
            'authorId',
            'top',
            'bazovaya_komplektaciya:ntext',
            'Standartnoe_oborudovanie:ntext',
            'Osobennosti:ntext',
            'sdasdasd',
            'quantity',
            'delivery_date',
            'article',
            'Test_novogo_polya2:ntext',
            'Tekstpole:ntext',
            'Nazvanie:ntext',
            'Nazvanie123213213:ntext',
        ],
    ]) ?>

</div>
