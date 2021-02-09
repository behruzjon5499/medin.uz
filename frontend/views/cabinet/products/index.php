<?php

use backend\forms\ProductsSearch;
use medin\entities\Products;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

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
            'id',
            [
                'attribute' => 'title_ru',
                'value' => function (Products $model) {
                    return Html::a($model->title_ru, ['cabinet/products/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            'title_ru',
            'title_en',
            [
                'attribute' => 'main_photo',
                'value' => function (Products $model) {
                    return Html::a(Html::img($model->getThumbFileUrl('main_photo', 's32')), ['cabinet/products/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
        ],
    ]); ?>
        </div>
    </div>
</div>
