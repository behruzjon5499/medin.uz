<?php

use medin\entities\Tariffs;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\TariffsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tariffs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tariffs-index">


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
                        'attribute' => 'title_uz',
                        'value' => function (Tariffs $model) {
                            return Html::a($model->title_ru, ['tariffs/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'photo',
                        'value' => function (Tariffs $model) {
                            return Html::a(Html::img($model->getThumbFileUrl('photo', 's32')), ['tariffs/view', 'id' => $model->id]);
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
