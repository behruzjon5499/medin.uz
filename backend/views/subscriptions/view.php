<?php

use medin\helpers\SubscriptionHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model \medin\entities\Subscriptions */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subscriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="catalogs-view">


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
            <?= Html::a(Yii::t('app', 'Wait'), ['wait', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
    </p>

    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'user.username',
                        'label' => $model->getAttributeLabel('user_id')
                    ],
                    [
                        'attribute' => 'tariff.title_ru',
                        'label' => $model->getAttributeLabel('tariff_id')
                    ],
                    'start_time:date',
                    'end_time:date',
                    [
                        'attribute' => 'status',
                        'value' => SubscriptionHelper::statusLabel($model->status),
                        'format' => 'raw',
                    ],
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>

        </div>
        <div class="col-md-6">

        </div>
    </div>


</div>
