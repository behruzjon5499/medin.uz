<?php

use medin\entities\Contacts;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\ContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">


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
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'title',
                'value' => function (Contacts $model) {
                    return Html::a($model->title, ['contacts/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'photo',
                'value' => function (Contacts $model) {
                    return Html::a(Html::img($model->getThumbFileUrl('photo', 's32')), ['contacts/view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            'description_ru',
            'description_uz',

        ],
    ]); ?>

        </div>
    </div>
</div>
