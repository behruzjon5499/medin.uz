<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Products */

$this->title = Yii::t('app', 'Update Products: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="products-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
