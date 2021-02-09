<?php

use medin\entities\Orders;
use medin\helpers\OrderHelper;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\OrdersSearch */
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
//                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'title_ru',
                        'value' => function (Orders $model) {
                            return Html::a($model->title_ru, ['orders/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    'phone',
                    [
                        'attribute' => 'user_id',
                        'value' => 'user.username',
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'status',
                        'filter' => OrderHelper::statusList(),
                        'value' => function (Orders $model) {
                            return OrderHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>
