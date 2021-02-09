<?php

use medin\entities\Distributors;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\DistributorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Distributors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributors-index">

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
//            ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'title_ru',
                        'value' => function (Distributors $model) {
                            return Html::a($model->title_ru, ['distributors/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'photo',
                        'value' => function (Distributors $model) {
                            return Html::a(Html::img($model->getThumbFileUrl('photo', 's32')), ['distributors/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'address',
                        'value' => function (Distributors $model) {
                            return Html::a($model->address, ['distributors/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    'phone',

                ],
            ]); ?>

        </div>
    </div>
</div>
