<?php

use backend\forms\SubscriptionsSearch;
use medin\entities\Subscriptions;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel SubscriptionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Subscriptions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogs-index">


    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="body-box">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'user_id',
                        'value' => function (Subscriptions $model) {
                            return Html::a($model->user->username, ['subscriptions/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],

                    [
                        'attribute' => 'tariff_id',
                        'value' => function (Subscriptions $model) {
                            return Html::a($model->tariff->title_ru, ['subscriptions/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],

                ],
            ]); ?>
        </div>
    </div>

</div>
