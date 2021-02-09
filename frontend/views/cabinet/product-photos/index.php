<?php

use medin\entities\ProductPhotos;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\ProductPhotosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Photos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-photos-index">


    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
        <div class="body-box">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'title_ru',
                'value' => function (ProductPhotos $model) {
                    return Html::a($model->product->title_ru, ['cabinet/product-photos/view', 'id' => $model->id]);
                },
                'format' => 'raw',      
            ],
            [
                'attribute' => 'photo',
                'value' => function (ProductPhotos $model) {
                    return Html::a(Html::img($model->getThumbFileUrl('photo', 's32')), ['cabinet/product-photos/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            'sort',

        ],
    ]); ?>

    </div>
</div></div>
