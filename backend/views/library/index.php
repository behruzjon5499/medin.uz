<?php

use medin\entities\Library;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\LibrarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Libraries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-index">


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
                        'value' => function (Library $model) {
                            return Html::a($model->title_ru, ['library/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    'title_uz',
                    'title_en',
                    [
                        'attribute' => 'photo',
                        'value' => function (Library $model) {
                            return Html::a(Html::img($model->getThumbFileUrl('photo', 's32')), ['library/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],

                ],
            ]); ?>
        </div>
    </div>

</div>
