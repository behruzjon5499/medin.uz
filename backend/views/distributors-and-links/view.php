<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model \medin\entities\DistributorsAndLinks */

$this->title = $model->distributor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Distributors And Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="distributors-and-links-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'distributor_id' => $model->distributor_id, 'link_id' => $model->link_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'distributor_id' => $model->distributor_id, 'link_id' => $model->link_id], [
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
                    'distributor.title_ru',
                    'link.title',
                    'url:url',
                ],
            ]) ?>
        </div>
        <div class="col-md-6"></div>
    </div>



</div>
