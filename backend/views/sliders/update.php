<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Sliders */

$this->title = Yii::t('app', 'Update Sliders: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sliders-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
