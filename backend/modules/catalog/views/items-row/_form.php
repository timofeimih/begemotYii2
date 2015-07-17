<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatItemsRow */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cat-items-row-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?php echo $form->field($model, 'name_t')->textInput(['maxlength' => 100]) ?>


    <div class="form-group">
        <?php echo $form->field($model, 'type')->begin();
        echo Html::activeLabel($model,'type') . "<br/>";
        $select =  ($model->isNewRecord ? '-1' : $model->type);

        $listArray['string']='Строка 255';
        $listArray['text']='text';
        $listArray['radioList']='радио список';
        $listArray['checkboxList']='чекбокс список';
        $listArray['select']='выпадающий список';
        $listArray['selectMultiple']='выпадающий список с несколькими значениями';
        echo Html::dropDownList('CatItemsRow[type]', $select, $listArray, array('empty' => '(Выберите тип)')) . "<br/>";
        echo Html::error($model,'type', ['class' => 'help-block']); //error
        echo $form->field($model, 'type')->end(); ?>

    </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <br/>
    <div>
        <h2>Описание работы:</h3>

            <p>Все названия полей вводятся по алгоритму Название|значение поля, если требуется несколько значений, то Название|#значение_поля1#значение_поля2 и так далее</p>

            <h3>Примеры:</h3>

            <p>Текстовое поле с начальным значением в поле "Text" - название|Text</p>
            <p>Чеклист - Название|#значение_поля1#значение_поля2</p>
    </div>

    

    <?php ActiveForm::end(); ?>

</div>


