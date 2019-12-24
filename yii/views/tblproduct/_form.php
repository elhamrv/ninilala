<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tblproduct */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="form-image">
<div class="tblproduct-form">

    <?php $form = ActiveForm::begin([
         'options' => ['enctype' => 'multipart/form-data'],
     ]); ?>

    <?= $form->field($model, 'type')->textInput() ?>
    
     <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'productcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['0' => ' ', '1' => 'verfügbar', '2' => 'ausverkauft']) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
