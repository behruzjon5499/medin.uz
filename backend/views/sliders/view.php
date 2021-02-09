<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model \medin\entities\Sliders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sliders-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
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

               ],
           ]) ?>
       </div>
       <div class="col-md-6">
           <?= DetailView::widget([
               'model' => $model,
               'attributes' => [

                   'created_at:date',
                   'updated_at:date',
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

    <?php $description_uz = DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'description_uz',
                'format' => 'raw',
                'label' => false
            ]
        ]
    ]) ?>

    <?php $description_en = DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'description_en',
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
            [
                'label' => Yii::t('app', 'Description Uz'),
                'content' => $description_uz,
            ],
            [
                'label' => Yii::t('app', 'Description En'),
                'content' => $description_en,
            ],
        ]
    ]) ?>


</div>
