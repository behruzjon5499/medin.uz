<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Subscriptions */

$this->title = Yii::t('app', 'Update Subscriptions: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subscriptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="catalogs-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
