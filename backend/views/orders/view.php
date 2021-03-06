<?php

use medin\entities\Orders;
use medin\helpers\OrderHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model Orders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">
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
            <?= Html::a(Yii::t('app', 'Active'), ['statusactive', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if ($model->isActive()): ?>
            <?= Html::a(Yii::t('app', 'Archive'), ['statusarchive', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if ($model->isArchive()): ?>
            <?= Html::a(Yii::t('app', 'Active'), ['statusactive', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
    </p>

    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'title_ru',
                    'title_uz',
                    'title_en',
                    [
                        'attribute' => 'status',
                        'value' => OrderHelper::statusLabel($model->status),
                        'format' => 'raw',
                    ],
                ],
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'user.username',
                        'label' => 'User'
                    ],
                    'phone',
                    'clinic_inn',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
        </div>
    </div>


</div>
