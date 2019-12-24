<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tblimage */
/* @var $form yii\widgets\ActiveForm */

//echo "real: " . \Yii::$app->basePath;
//echo "<br>web: " . Yii::getAlias('@web');
//echo "<br>webroot: " . Yii::getAlias('@webroot') . '/web/thumbnail';

?>
<div class="form-image">
  <div class="tblimage-form ">

    <?php $form = ActiveForm::begin([
         'options' => ['enctype' => 'multipart/form-data'],
     ]); ?>

    <?= $form->field($model, 'photocod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'resulationw')->textInput() ?>

    <?= $form->field($model, 'resulationh')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['0' => ' ', '1' => 'verfügbar', '2' => 'ausverkauft']) ?>

    <?= $form->field($model, 'photopath')->fileInput() ?>
    
    <?= $form->field($model, 'thumbnailpath')->fileInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

  </div>
</div>