<?php

use backend\forms\DistributorsSearch;
use medin\entities\Distributors;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel DistributorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Distributors');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="distributors-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box">
        <div class="body-box">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'title_uz',
                'value' => function (Distributors $model) {
                    return Html::a($model->title_ru, ['cabinet/distributors/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            'title_uz',
            'title_en',
            [
                'attribute' => 'photo',
                'value' => function (Distributors $model) {
                    return Html::a(Html::img($model->getThumbFileUrl('photo', 's32')), ['cabinet/distributors/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],

        ],
    ]); ?>
        </div>
    </div>
</div>
