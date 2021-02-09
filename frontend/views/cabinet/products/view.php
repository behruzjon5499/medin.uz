<?php

use medin\entities\Products;
use medin\helpers\Producthelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model Products */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">
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
                    [
                        'attribute' => 'user.username',
                        'label' => 'Username'
                    ],
                    [
                        'attribute' => 'catalog.title_ru',
                        'label' => 'Catalog'
                    ],
                    'price',
                    'old_price',
                ],
            ]) ?>

        </div>
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                        [
                        'attribute' => 'main_photo',
                        'value' => function (Products $model) {
                            return Html::a(Html::img($model->getThumbFileUrl('main_photo', 's128')));
                        },

                        'format' => 'raw',
                    ],

                    [
                        'attribute' => 'sale_status',
                        'value' => Producthelper::salestatusLabel($model->sale_status),
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'status',
                        'value' => Producthelper::statusLabel($model->status),
                        'format' => 'raw',
                    ],
                    'view',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>

        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                [
                    'attribute' => 'sale_description',
                    'format' => 'raw'
                ],

            'sale_endtime:datetime',
        ],
    ]) ?>
    <?php $description_ru = DetailView::widget(['model' => $model,
    'attributes' => [['attribute' => 'description_ru',
    'format' => 'raw',
    'label' => false]]]) ?>

    <?php $description_uz = DetailView::widget(['model' => $model,
    'attributes' => [['attribute' => 'description_uz',
    'format' => 'raw',
    'label' => false]]]) ?>

    <?php $description_en = DetailView::widget(['model' => $model,
    'attributes' => [['attribute' => 'description_en',
    'format' => 'raw',
    'label' => false]]]) ?>

    <?= \yii\bootstrap\Tabs::widget(['items' => [['label' => Yii::t('app', 'Description Ru'),
    'content' => $description_ru,
    'active' => true],
    ['label' => Yii::t('app', 'Description Uz'),
    'content' => $description_uz,],
    ['label' => Yii::t('app', 'Description En'),
    'content' => $description_en,],]]) ?>

</div>
