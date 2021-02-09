<?php

use medin\entities\Sliders;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\SlidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sliders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-index">

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
                        'value' => function (Sliders $model) {
                            return Html::a($model->title_ru, ['sliders/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    'title_uz',
                    'title_en',
                ],
            ]); ?>

        </div>
    </div>
</div>
