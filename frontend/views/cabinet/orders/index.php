<?php

use backend\forms\OrdersSearch;
use medin\entities\Orders;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">


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
                'value' => function (Orders $model) {
                    return Html::a($model->title_ru, ['cabinet/orders/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],

            [
                'attribute' => 'title_en',
                'value' => function (Orders $model) {
                    return Html::a($model->title_en, ['cabinet/orders/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'phone',
                'value' => function (Orders $model) {
                    return Html::a($model->phone, ['cabinet/orders/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            //'clinic_inn',
            //'created_at',
            //'updated_at',

        ],
    ]); ?>

        </div>
    </div>
</div>
