<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tblproduct */

$this->title = Yii::t('app', 'New product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Manege Product'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
