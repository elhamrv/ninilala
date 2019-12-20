<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tblimage */

$this->title = Yii::t('app', 'Add New Image');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ImageManegment'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblimage-create">

    <h1>Add new Image</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
