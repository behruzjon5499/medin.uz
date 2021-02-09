<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\DistributorsAndLinks */

$this->title = Yii::t('app', 'Update Distributors And Links: {name}', [
    'name' => $model->distributor_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Distributors And Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->distributor_id, 'url' => ['view', 'distributor_id' => $model->distributor_id, 'link_id' => $model->link_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="distributors-and-links-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
