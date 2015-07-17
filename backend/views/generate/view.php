<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\CallButtons $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Call Buttons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-buttons-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'phone',
            'website',
            ['label' => 'code','value' =>'<div id="call_widget_container"></div><script src="http://calls-express.com/call_assets/script.js" charset="UTF-8"></script><script type="text/javascript">var call_code="' . $model->md5 . '";</script>' ],
        ],
    ]) ?>

</div>
