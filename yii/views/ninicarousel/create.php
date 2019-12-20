<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ninicarousel */

$this->title = Yii::t('app', 'Add photo to Ninicarousel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ninicarousels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ninicarousel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
