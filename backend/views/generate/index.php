<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\CallButtonsSearch $searchModel
 */

$this->title = Yii::t('app', 'Call Buttons');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-buttons-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новую кнопку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'phone',
            'website',
            'code' => ['label' => 'code', 'format' => 'text','value' => function($data) { return '<div id="call_widget_container"></div><script src="http://calls-express.com/call_assets/script.js/call_assets/script.js" charset="UTF-8"></script><script type="text/javascript">var call_code="' . $data->md5 . '";</script>'; }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
