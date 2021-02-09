<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Distributors */

$this->title = Yii::t('app', 'Update Distributors: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Distributors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="distributors-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
