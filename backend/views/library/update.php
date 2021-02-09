<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Library */

$this->title = Yii::t('app', 'Update Library: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libraries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="library-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
