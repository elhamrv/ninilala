<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tblimage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tblimages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tblimage-view">

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
            'id',
            'photocod',
            'title',
            'resulationw',
            'resulationh',
            'created',
            [
                'attribute'=>'status',
                'value' => function ($model) {
                return $model->status == 1 ? "verfügbar" : "ausverkauft";
                },
                
            ],
            [
                'attribute'=>'photopath',
                'value'=>Yii::getAlias('@uploadedimageImgUrl').'/'.$model->photopath ,
                'format'=>['image',['width'=>'100','height'=>'100']]
            ],
            [
                'attribute'=>'thumbnailpath',
                'value'=>Yii::getAlias('@web').'/'.$model->thumbnailpath ,
                'format'=>['image',['width'=>'100','height'=>'100']]
            ],
            
            'comments:ntext',
        ],
    ]) ?>

</div>
