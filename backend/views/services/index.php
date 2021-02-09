<?php

use backend\forms\ServicesSearch;
use medin\entities\Services;
use medin\helpers\ServicesHelper;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel ServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Services');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">


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
                        'attribute' => 'username',
                        'value' => function (Services $model) {
                            return Html::a($model->username, ['services/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    'phone',
                    [
                        'attribute' => 'status',
                        'filter' => ServicesHelper::statusList(),
                        'value' => function (Services $model) {
                            return ServicesHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                    'organization_name',

                ],
            ]); ?>
        </div>
    </div>

</div>
