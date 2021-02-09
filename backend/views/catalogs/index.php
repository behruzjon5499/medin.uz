<?php

use medin\entities\Catalogs;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\CatalogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Catalogs');
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
                        'value' => function (Catalogs $model) {
                            return Html::a($model->title_ru, ['catalogs/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],

                    [
                        'attribute' => 'photo',
                        'value' => function (Catalogs $model) {
                            return Html::a(Html::img($model->getThumbFileUrl('photo', 's32')), ['catalogs/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],

                ],
            ]); ?>
        </div>
    </div>

</div>
