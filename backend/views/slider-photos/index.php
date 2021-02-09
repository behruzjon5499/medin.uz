<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\SliderPhotosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Slider Photos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-photos-index">


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
                        'attribute' => 'slider_id',
                        'value' => 'slider.title_ru',
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'photo',
                        'value' => function (\medin\entities\SliderPhotos $model) {
                            return Html::a(Html::img($model->getThumbFileUrl('photo', 's32')), ['slider-photos/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>
