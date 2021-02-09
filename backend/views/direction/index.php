<?php

use medin\entities\Direction;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\CatalogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Direction');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogs-index">


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
                        'value' => function (Direction $model) {
                            return Html::a($model->title_ru, ['direction/view', 'id' => $model->id]);
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
