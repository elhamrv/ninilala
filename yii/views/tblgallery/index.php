<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblgallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', ' Gallery');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index">
<div class="tbl-gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add to Gallery'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'code',
            'price',
            'description:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view' => function ($url, $model) {
                    return Html::a('<img class="" style="width:20px;" src="' . Yii::getAlias("@web") . '/web/images/icons/PNG/128/view.png" />', $url, ['title' => Yii::t('yii', 'View'),]);
                    },
                    'update' => function ($url, $model) {
                    return Html::a('<img class="" style="width:20px;" src="' . Yii::getAlias("@web") . '/web/images/icons/PNG/64/pen_3.png" />', $url, ['title' => Yii::t('yii', 'Update'),]);
                    },
                    'delete' => function ($url, $model) {
                    return Html::a('<img class="" style="width:20px;" src="' . Yii::getAlias("@web") . '/web/images/icons/PNG/128/bin.png" />', $url, ['title' => Yii::t('yii', 'Delete'), 'data-method' => 'post' ,'data-confirm' => 'Are you sure you want to delete this item?']);
                    },
                    
                    ]
                    
                    
                    ],
                    ],
                    ]); ?>
            
</div>
</div>
