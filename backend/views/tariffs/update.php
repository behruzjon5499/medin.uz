<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Tariffs */

$this->title = Yii::t('app', 'Update Tariffs: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tariffs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tariffs-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
