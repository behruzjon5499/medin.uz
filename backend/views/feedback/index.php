<?php

use medin\entities\Feedback;
use medin\helpers\FeedbackHelper;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel \backend\forms\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Feedbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">


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
                        'attribute' => 'user_id',
                        'value' => 'user.username',
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'full_name',
                        'value' => function (Feedback $model) {
                            return Html::a($model->full_name, ['feedback/view', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'status',
                        'filter' => FeedbackHelper::statusList(),
                        'value' => function (Feedback $model) {
                            return FeedbackHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                    'phone_email:email',
                    'massage:ntext',
                ],
            ]); ?>
        </div>
    </div>

</div>
