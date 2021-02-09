<?php

use medin\entities\Services;
use medin\helpers\ServicesHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model Services */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="services-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?php if ($model->isWait()): ?>
            <?= Html::a(Yii::t('app', 'Active'), ['active', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if ($model->isActive()): ?>
            <?= Html::a(Yii::t('app', 'wait'), ['wait', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
    </p>

    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    'phone',
                    'email:email',
                ],
            ]) ?>

        </div>
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'organization_name',
                    'experience',
                    [
                        'attribute' => 'status',
                        'value' => ServicesHelper::statusLabel($model->status),
                        'format' => 'raw',
                    ],
                ],
            ]) ?>

        </div>
    </div>

    <?php $description_ru = DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'description_ru',
                'format' => 'raw',
                'label' => false
            ]
        ]
    ]) ?>


    <?= \yii\bootstrap\Tabs::widget([
        'items' => [
            [
                'label' => Yii::t('app', 'Description Ru'),
                'content' => $description_ru,
                'active' => true
            ],
        ]
    ]) ?>
</div>
