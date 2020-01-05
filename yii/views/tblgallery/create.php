<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblGallery */

$this->title = Yii::t('app', 'Add New');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gallery'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'images' => $images
    ]) ?>

</div>
