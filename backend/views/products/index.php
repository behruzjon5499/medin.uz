<?php

use medin\entities\Products;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">


    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="body-box">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
//                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    [
                        'attribute' => 'title_ru',
                        'value' => function (Products $model) {
                            return Html::a($model->title_ru, ['products/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'main_photo',
                        'value' => function (Products $model) {
                            return Html::a(Html::img($model->getThumbFileUrl('main_photo', 's32')), ['products/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>
        </div>
    </div>


</div>
