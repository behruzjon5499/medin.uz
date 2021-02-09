<?php

/* @var $this yii\web\View */
/* @var $model \medin\entities\Contacts */

$this->title = Yii::t('app', 'Update Contacts: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contacts-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
